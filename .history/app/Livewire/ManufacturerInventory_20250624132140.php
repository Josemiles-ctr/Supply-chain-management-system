<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RawMaterial;
use Illuminate\Support\Facades\Auth;
use App\Models\RawMaterialsPurchaseOrder;


class ManufacturerInventory extends Component
{
    public $rawmaterials;
    public $showModal = false;
    public $selected_rawmaterial;
<<<<<<< HEAD
    public $selected_rawmaterial_id;
    public $rawmaterial_name;
    public $rawmaterial_price;
    public $rawmaterial_category;
    public $rawmaterial_quantity=1;
    public $unit_of_measure;
    public $rawmaterial_message;
    public $total;
    public $supplier_id; 
    public $delivery_option;
    
    public function mount()
    {
        $this->fetchRawmaterials();
        $this->delivery_option='delivery';
    }
    public function fetchRawmaterials(){
        $this->rawmaterials = RawMaterial::with('category')->get();
    }
    public function rules(){
    return [
        'delivery_option' => 'required|in:pickup,delivery',
        'rawmaterial_quantity' => 'required|numeric|min:1',
      
    ];
}
   public function select_rawmaterial($id)

    {
        $raw = RawMaterial::with('category')->find($id);
    
        if ($raw) {
<<<<<<< HEAD
            $this->selected_rawmaterial_id=$id;
            $this->selected_rawmaterial = $raw;
            $this->rawmaterial_name = $raw->name;
            $this->rawmaterial_price = $raw->price;
            $this->rawmaterial_category = $raw->category->name;
            $this->unit_of_measure=$raw->unit_of_measure;
            $this->rawmaterial_quantity= $raw->reorder_level;
            $this->showModal = true;
            $this->supplier_id =$raw->supplier_id;
            $this->calculateTotal();
        }
        $this->calculateTotal();

    }
    public function updatedRawmaterialQuantity($value)
    {
        // Convert to number in case it comes as string
        $this->rawmaterial_quantity = (int)$value;
        $this->calculateTotal();
    }
    public function calculateTotal()
{
    $quantity = $this->rawmaterial_quantity ?? 1;
    $price = $this->rawmaterial_price ?? 0;
    $this->total = $quantity * $price;
}
 
=======
            $this->selected_rawmaterial = $raw;
            $this->rawmaterial_name = $raw->name;
            $this->rawmaterial_price = $raw->price;
            $this->rawmaterial_category = $raw->category?->name;
            $this->showModal = true;
        }
    }
    
>>>>>>> 80f50138c3907542b7a8fbe9eb7a7395947246f1
    public function closeModal()
    {
        $this->showModal = false;
    }
<<<<<<< HEAD

    public function updateStockLevel(){
        $update_level=RawMaterial::find($this->selected_rawmaterial_id);
        $new_level= (int)$update_level->current_stock + (int)$this->rawmaterial_quantity;
        $update_level->update([
            'current_stock'=> $new_level
        ]);
        $this->fetchRawmaterials();
    }
        
        public function placeOrder(){
         try {
        $purchase_order= RawMaterialsPurchaseOrder::create([
            'raw_material_id' => $this->selected_rawmaterial_id,
            'supplier_id' => $this->supplier_id,
            'quantity'=> $this->rawmaterial_quantity,
            'price_per_unit'=> $this->rawmaterial_price,
            'order_date'=>  now()->format('Y-m-d'),
            'expected_delivery_date'=> now()->addDays(3)->format('Y-m-d'),
            'notes'=> $this->rawmaterial_message,
            'delivery_option'=> $this->delivery_option,
            'total_price'=>$this->total,
            'created_by'=> Auth::id()
        ]);
        $this->updateStockLevel();
        $this->reset(['rawmaterial_quantity', 'delivery_option', 'rawmaterial_message', 'unit_of_measure', 'showModal']);
        $this->dispatch('order-placed', message: 'Order placed successfully!');
        
    } catch (\Exception $e) {
        $this->dispatch('order-failed', message : 'fOops Failed to place order. Please provide all the necessary fields. Consider Reporting if this problem persists ');
    }
}
  
=======
    
    public function placeOrder()
    {
        // You can store the order here
    
        $this->reset(['rawmaterial_quantity', 'rawmaterial_message', 'showModal']);
        session()->flash('success', 'Order placed successfully.');
    }
    
>>>>>>> 80f50138c3907542b7a8fbe9eb7a7395947246f1
    public function render()
    {
        return view('livewire.manufacturer-inventory');
    }
}