<?php

namespace App\Filament\Customer\Pages;

use App\Models\Product;
use App\Models\Wishlist;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class WishlistPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?int $navigationSort = 3;
    protected static string $view = 'filament.customer.pages.wishlist-page';
    protected static ?string $title = ' My Wishlist';

    public $wishlistItems = [];

    public array $cart = [];
    public int $potentialTokens = 0;

    // For size selection dropdown 
    public array $showSizeDropdown = [];
    public array $selectedSize = [];
    public array $sizes = ['S', 'M', 'L', 'XL'];

    // For modal management
    public $clickedProduct = null;
    public $selectedProduct = false;

    public function mount(): void
    {
        $this->cart = session()->get('cart', []);
        $this->refreshWishlist();
        $this->updateTokens();
    }

    public function getCartCountProperty(): int
    {
        return collect($this->cart)->sum('quantity');
    }

    protected function notify(string $message, string $type = 'success'): void
    {
        Notification::make()->title($message)->{$type}()->send();
    }

    public function refreshWishlist(): void
    {
        $this->wishlistItems = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->get();
    }

    public function removeFromWishlist($wishlistId): void
    {
        $item = Wishlist::where('id', $wishlistId)
            ->where('user_id', Auth::id())
            ->first();

        if ($item) {
            $item->delete();
            $this->notify('Removed from Wishlist');
            $this->refreshWishlist();
        }
    }

    // Modal open method - new
    public function openProductModal(int $productId): void
    {
        $this->clickedProduct = Product::find($productId);
        $this->selectedProduct = true;
    }

    // Modal close method - new
    public function closeProductModal(): void
    {
        $this->clickedProduct = null;
        $this->selectedProduct = false;
    }

    /**
     * Show size dropdown for product when user clicks "Add to Cart"
     */
    public function addToCart(int $productId): void
    {
        $product = Product::find($productId);

        if (!$product || $product->quantity_available < 1) {
            $this->notify('Product out of stock', 'danger');
            return;
        }

        // Always trigger size selection dropdown
        $this->showSizeDropdown[$productId] = true;
    }

    /**
     * Confirm size → Add or increment product-size entry
     */
    public function confirmAddToCart(int $productId): void
    {
        $product = Product::find($productId);
        if (!$product) {
            $this->notify('Product not found', 'danger');
            return;
        }

        $size = $this->selectedSize[$productId] ?? null;

        if (!$size) {
            $this->notify('Please select a size before confirming', 'danger');
            return;
        }

        // Create unique cart key combining product ID and size
        $cartKey = $productId . '-' . $size;

        if (isset($this->cart[$cartKey])) {
            // Increment quantity for existing product-size entry
            $currentQty = $this->cart[$cartKey]['quantity'];

            $maxQty = min(50, $product->quantity_available);
            if ($currentQty >= $maxQty) {
                $this->notify("Maximum stock limit reached for {$product->name}", 'warning');
                return;
            }

            $this->cart[$cartKey]['quantity']++;
        } else {
            // Add new entry for product-size
            $this->cart[$cartKey] = [
                'product_id' => $productId,
                'size'       => $size,
                'quantity'   => 1,
            ];
        }

        session()->put('cart', $this->cart);

        // Hide dropdown after confirming
        unset($this->showSizeDropdown[$productId], $this->selectedSize[$productId]);

        $this->updateTokens();
        $this->notify("Added {$product->name} (Size: $size) to cart");
    }

    /**
     * Remove a specific product+size entry from cart
     */
    public function removeFromCart(string $cartKey): void
    {
        if (isset($this->cart[$cartKey])) {
            unset($this->cart[$cartKey]);
            session()->put('cart', $this->cart);
            $this->updateTokens();
            $this->notify('Removed from cart');
        }
    }

    /**
     * Increment quantity for a specific product+size
     */
    public function incrementQuantity(string $cartKey): void
    {
        if (!isset($this->cart[$cartKey])) return;

        $productId = $this->cart[$cartKey]['product_id'];
        $product   = Product::find($productId);

        if (!$product) {
            $this->notify('Product not found', 'danger');
            return;
        }

        $currentQty = $this->cart[$cartKey]['quantity'];
        $maxQty     = min(50, $product->quantity_available);

        if ($currentQty >= $maxQty) {
            $this->notify("Maximum stock limit reached for {$product->name}", 'warning');
            return;
        }

        $this->cart[$cartKey]['quantity']++;
        session()->put('cart', $this->cart);
        $this->updateTokens();
    }

    /**
     * Decrement quantity for a specific product+size
     */
    public function decrementQuantity(string $cartKey): void
    {
        if (!isset($this->cart[$cartKey])) return;

        $this->cart[$cartKey]['quantity']--;

        if ($this->cart[$cartKey]['quantity'] < 1) {
            unset($this->cart[$cartKey]);
        }

        session()->put('cart', $this->cart);
        $this->updateTokens();
    }

    /**
     * Allow user to add another size of same product
     */
    public function requestNewSize(int $productId): void
    {
        $this->showSizeDropdown[$productId] = true;
    }

    protected function updateTokens(): void
    {
        $total = $this->calculateCartTotal();
        $this->potentialTokens = $total > 50000 ? floor($total / 15000) : 0;
    }

    protected function calculateCartTotal(): int
    {
        return collect($this->cart)->reduce(function ($total, $item) {
            $product = Product::find($item['product_id']);
            if (!$product) return $total;
            return $total + ($product->price * ($item['quantity'] ?? 0));
        }, 0);
    }
}
