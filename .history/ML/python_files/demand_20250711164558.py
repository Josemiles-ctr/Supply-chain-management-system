import os
import pandas as pd
import numpy as np
import mysql.connector
from datetime import datetime, timedelta
from dotenv import load_dotenv
from sklearn.linear_model import LinearRegression

# Load .env for DB credentials
from pathlib import Path
load_dotenv(dotenv_path=Path('../../.env'))

DB_HOST = os.getenv('DB_HOST', 'localhost')
DB_USER = os.getenv('DB_USERNAME', 'root')
DB_PASS = os.getenv('DB_PASSWORD', '')
DB_NAME = os.getenv('DB_DATABASE', 'optiwear')

# Connect to MySQL
def get_db_connection():
    return mysql.connector.connect(
        host=DB_HOST,
        user=DB_USER,
        password=DB_PASS,
        database=DB_NAME
    )

def load_data():
    df = pd.read_csv('../datasets/demand_dataset.csv')
    df['Date'] = pd.to_datetime(df['Date'])
    return df

def predict_demand(df, time_frame):
    results = []
    categories = ['Children Wear', 'Workwear', 'Sportswear', 'Formal Wear', 'Casual Wear']
    for cat in categories:
        cat_df = df[df['Product Category'] == cat]
        if cat_df.empty:
            continue
        # Aggregate by date
        daily = cat_df.groupby('Date')['Quantity'].sum().reset_index()
        # Prepare features: days since start
        daily = daily.sort_values('Date')
        daily['Day'] = (daily['Date'] - daily['Date'].min()).dt.days
        X = daily[['Day']]
        y = daily['Quantity']
        # Simple linear regression
        model = LinearRegression().fit(X, y)
        # Predict for the time frame
        if time_frame == '30_days':
            future_days = 30
        elif time_frame == '12_months':
            future_days = 365
        elif time_frame == '5_years':
            future_days = 365 * 5
        else:
            future_days = 30
        start_day = daily['Day'].max() + 1
        for i in range(future_days):
            pred_day = start_day + i
            pred_date = daily['Date'].max() + timedelta(days=i+1)
            # Suppress sklearn warning by using DataFrame with column name
            pred_qty = int(max(0, round(model.predict(pd.DataFrame({'Day': [pred_day]}))[0])))
            results.append({
                'shirt_category': cat,
                'prediction_date': pred_date.strftime('%Y-%m-%d'),
                'predicted_quantity': pred_qty,
                'time_frame': time_frame
            })
    return results

def save_predictions(predictions):
    conn = get_db_connection()
    cursor = conn.cursor()
    for pred in predictions:
        cursor.execute('''
            INSERT INTO demand_prediction_results (shirt_category, prediction_date, predicted_quantity, time_frame, created_at, updated_at)
            VALUES (%s, %s, %s, %s, NOW(), NOW())
        ''', (
            pred['shirt_category'],
            pred['prediction_date'],
            pred['predicted_quantity'],
            pred['time_frame']
        ))
    conn.commit()
    cursor.close()
    conn.close()

def main():
    df = load_data()
    all_predictions = []
    for tf in ['30_days', '12_months', '5_years']:
        preds = predict_demand(df, tf)
        all_predictions.extend(preds)
    save_predictions(all_predictions)
    print('Demand predictions saved to database.')

if __name__ == '__main__':
    main()
