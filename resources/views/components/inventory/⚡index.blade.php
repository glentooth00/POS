
<?php

use Livewire\Component;

new class extends Component
{
    public bool $showProductModal = false;

    public string $description = '';
    public string $price = '';
    public string $unit = '';
    public string $category = '';

    public array $items = [
        [
            'id' => 1,
            'description' => 'Coca-Cola 1.5L',
            'price' => 55.00,
            'unit' => 'PCS',
            'category' => 'Beverage',
        ],
        [
            'id' => 2,
            'description' => 'Piattos Cheese',
            'price' => 25.00,
            'unit' => 'PCS',
            'category' => 'Snacks',
        ],
        [
            'id' => 3,
            'description' => 'Lucky Me Pancit Canton',
            'price' => 15.00,
            'unit' => 'PCS',
            'category' => 'Food',
        ],
        [
            'id' => 4,
            'description' => 'Nescafe Classic 25g',
            'price' => 35.00,
            'unit' => 'PCS',
            'category' => 'Beverage',
        ],
        [
            'id' => 5,
            'description' => 'Century Tuna 155g',
            'price' => 42.00,
            'unit' => 'PCS',
            'category' => 'Canned Goods',
        ],
    ];

    public array $units = [
        'PCS',
        'Box',
        'Set',
        'Meter',
        'Feet',
        'Kilo',
        'Pairs',
    ];

    public function openProductModal(): void
    {
        $this->resetValidation();

        $this->description = '';
        $this->price = '';
        $this->unit = '';
        $this->category = '';

        $this->showProductModal = true;
    }

    public function saveProduct(): void
    {
        $this->validate([
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'unit' => ['required', 'string'],
            'category' => ['required', 'string', 'max:100'],
        ]);

        $this->items[] = [
            'id' => count($this->items) + 1,
            'description' => $this->description,
            'price' => (float) $this->price,
            'unit' => $this->unit,
            'category' => $this->category,
        ];

        $this->showProductModal = false;

        $this->reset([
            'description',
            'price',
            'unit',
            'category',
        ]);
    }
};
?>

<div class="space-y-6">

    {{-- ============================================================
        PAGE HEADER
    ============================================================= --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <flux:heading size="xl">
                Products
            </flux:heading>

            <flux:text class="mt-1">
                Manage your products, pricing, units, and categories.
            </flux:text>
        </div>

        <flux:button
            variant="primary"
            icon="plus"
            wire:click="openProductModal"
        >
            New
        </flux:button>

    </div>

    <flux:separator />

    {{-- ============================================================
        PRODUCTS TABLE
    ============================================================= --}}
    <flux:table>

        <flux:table.columns>

            <flux:table.column>
                Description
            </flux:table.column>

            <flux:table.column>
                Price
            </flux:table.column>

            <flux:table.column>
                Unit
            </flux:table.column>

            <flux:table.column>
                Category
            </flux:table.column>

            <flux:table.column>
            </flux:table.column>

        </flux:table.columns>

        <flux:table.rows>

            @foreach ($items as $item)

                <flux:table.row :key="$item['id']">

                    {{-- Description --}}
                    <flux:table.cell>
                        <flux:text class="font-medium">
                            {{ $item['description'] }}
                        </flux:text>
                    </flux:table.cell>

                    {{-- Price --}}
                    <flux:table.cell class="whitespace-nowrap">
                        ₱{{ number_format($item['price'], 2) }}
                    </flux:table.cell>

                    {{-- Unit --}}
                    <flux:table.cell>
                        <flux:badge
                            size="sm"
                            color="zinc"
                        >
                            {{ $item['unit'] }}
                        </flux:badge>
                    </flux:table.cell>

                    {{-- Category --}}
                    <flux:table.cell>
                        {{ $item['category'] }}
                    </flux:table.cell>
                    {{-- Actions --}}
                    <flux:table.cell class="py-0 text-right">

                        <flux:dropdown position="bottom" align="end">

                            <flux:button
                                variant="ghost"
                                size="sm"
                                icon="ellipsis-horizontal"
                            />

                            <flux:menu>

                                <flux:menu.item
                                    icon="pencil"
                                    wire:click="editProduct({{ $item['id'] }})"
                                >
                                    Edit
                                </flux:menu.item>

                                <flux:menu.separator />

                                <flux:menu.item
                                    icon="trash"
                                    variant="danger"
                                    wire:click="deleteProduct({{ $item['id'] }})"
                                >
                                    Delete
                                </flux:menu.item>

                            </flux:menu>

                        </flux:dropdown>

                    </flux:table.cell>
                </flux:table.row>

            @endforeach

        </flux:table.rows>

    </flux:table>


    {{-- ============================================================
        NEW PRODUCT MODAL
    ============================================================= --}}
    <flux:modal
        wire:model="showProductModal"
        class="md:w-[500px]"
    >

        <div class="space-y-6">

            {{-- Modal Header --}}
            <div>
                <flux:heading size="lg">
                    New Product
                </flux:heading>

                <flux:text class="mt-1">
                    Add a new product to your inventory.
                </flux:text>
            </div>


            {{-- Form --}}
            <div class="space-y-5">

                {{-- Description --}}
                <flux:input
                    label="Description"
                    placeholder="Enter product description"
                    wire:model="description"
                    icon="cube"
                />

                {{-- Price --}}
                <flux:input
                    label="Price"
                    type="number"
                    step="0.01"
                    min="0"
                    placeholder="0.00"
                    wire:model="price"
                    icon="banknotes"
                />

                {{-- Unit --}}
                <flux:select
                    label="Unit"
                    placeholder="Select unit"
                    wire:model="unit"
                >

                    @foreach ($units as $unitOption)

                        <flux:select.option value="{{ $unitOption }}">
                            {{ $unitOption }}
                        </flux:select.option>

                    @endforeach

                </flux:select>

                {{-- Category --}}
                <flux:input
                    label="Category"
                    placeholder="Enter product category"
                    wire:model="category"
                    icon="tag"
                />

            </div>


            {{-- Modal Actions --}}
            <div class="flex justify-end gap-2">

                <flux:modal.close>
                    <flux:button variant="ghost">
                        Cancel
                    </flux:button>
                </flux:modal.close>

                <flux:button
                    variant="primary"
                    icon="check"
                    wire:click="saveProduct"
                >
                    Save Product
                </flux:button>

            </div>

        </div>

    </flux:modal>

</div>

