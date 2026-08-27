
<?php

use Livewire\Component;

new class extends Component
{
    public array $items = [
        [
            'id' => 1,
            'name' => 'Coca-Cola 1.5L',
            'sku' => 'COKE-15',
            'category' => 'Beverage',
            'brand' => 'Coca-Cola',
            'stock' => 25,
            'unit' => 'pcs',
            'cost_price' => 45.00,
            'selling_price' => 55.00,
            'reorder_level' => 10,
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0-eGj9BgiTDJ4ZTvZpsEsnIfq-QHgC1sY7fiIbHHmeg&s=10',
        ],
        [
            'id' => 2,
            'name' => 'Piattos Cheese',
            'sku' => 'PIA-001',
            'category' => 'Snacks',
            'brand' => 'Jack n Jill',
            'stock' => 8,
            'unit' => 'pcs',
            'cost_price' => 18.00,
            'selling_price' => 25.00,
            'reorder_level' => 10,
            'image' => 'https://store.iloilosupermart.com/wp-content/uploads/2020/05/65659.jpg',
        ],
        [
            'id' => 3,
            'name' => 'Lucky Me Pancit Canton',
            'sku' => 'LMC-001',
            'category' => 'Food',
            'brand' => 'Lucky Me',
            'stock' => 0,
            'unit' => 'pcs',
            'cost_price' => 10.00,
            'selling_price' => 15.00,
            'reorder_level' => 10,
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQb-NHfbmYY-hK9cMx7ulvtO11Ws6oJwCI78bjgDnr9FQ&s=10',
        ],
        [
            'id' => 4,
            'name' => 'Nescafe Classic 25g',
            'sku' => 'NES-025',
            'category' => 'Beverage',
            'brand' => 'Nescafe',
            'stock' => 32,
            'unit' => 'pcs',
            'cost_price' => 28.00,
            'selling_price' => 35.00,
            'reorder_level' => 10,
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUabQ1W55ncEf34gErL0aeLMaURtmEc92vC3WleJl6-A&s=10',
        ],
        [
            'id' => 5,
            'name' => 'Century Tuna 155g',
            'sku' => 'CNT-155',
            'category' => 'Canned Goods',
            'brand' => 'Century',
            'stock' => 5,
            'unit' => 'pcs',
            'cost_price' => 32.00,
            'selling_price' => 42.00,
            'reorder_level' => 10,
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReCqXsTzKIJxp1dZ-uDfyl8SvgJqRkNyhAJ0cDmueXFQ&s=10',
        ],
    ];
};

?>

<div class="space-y-6">

    {{-- Header --}}
    <div>

        <flux:heading size="xl">
            Inventory
        </flux:heading>

        <flux:text class="mt-1">
            Manage inventory items.
        </flux:text>

    </div>

    <flux:separator />

    {{-- Add Item Button --}}
    <div>

        <flux:button
            variant="primary"
            icon="squares-plus"
            color="blue"
            href="{{ route('inventory.create') }}"
        >
            Add Inventory Item
        </flux:button>

    </div>


    {{-- Inventory Table --}}
    <flux:table>

        <flux:table.columns>

            <flux:table.column>
                Item
            </flux:table.column>

            <flux:table.column>
                SKU
            </flux:table.column>

            <flux:table.column>
                Category
            </flux:table.column>

            <flux:table.column>
                Stock
            </flux:table.column>

            <flux:table.column>
                Cost Price
            </flux:table.column>

            <flux:table.column>
                Selling Price
            </flux:table.column>

            <flux:table.column>
                Status
            </flux:table.column>

            <flux:table.column>
            </flux:table.column>

        </flux:table.columns>


        <flux:table.rows>

            @foreach ($items as $item)

                <flux:table.row :key="$item['id']">

                    {{-- Item --}}
                    <flux:table.cell class="flex items-center gap-3">

                        <flux:avatar
                            size="sm"
                            src="{{ $item['image'] ?? asset('images/default-item.png') }}"
                        />

                        <div>

                            <flux:text class="font-medium">
                                {{ $item['name'] }}
                            </flux:text>

                            <flux:text
                                size="sm"
                                class="text-zinc-500"
                            >
                                {{ $item['brand'] }}
                            </flux:text>

                        </div>

                    </flux:table.cell>


                    {{-- SKU --}}
                    <flux:table.cell class="whitespace-nowrap">

                        {{ $item['sku'] }}

                    </flux:table.cell>


                    {{-- Category --}}
                    <flux:table.cell>

                        {{ $item['category'] }}

                    </flux:table.cell>


                    {{-- Stock --}}
                    <flux:table.cell class="whitespace-nowrap">

                        <span class="font-medium">
                            {{ $item['stock'] }}
                        </span>

                        <span class="text-zinc-500 text-sm">
                            {{ $item['unit'] }}
                        </span>

                    </flux:table.cell>


                    {{-- Cost Price --}}
                    <flux:table.cell class="whitespace-nowrap">

                        ₱{{ number_format($item['cost_price'], 2) }}

                    </flux:table.cell>


                    {{-- Selling Price --}}
                    <flux:table.cell
                        variant="strong"
                        class="whitespace-nowrap"
                    >

                        ₱{{ number_format($item['selling_price'], 2) }}

                    </flux:table.cell>


                    {{-- Status --}}
                    <flux:table.cell class="py-0">

                        @if ($item['stock'] <= 0)

                            <flux:badge
                                size="sm"
                                color="red"
                            >
                                Out of Stock
                            </flux:badge>

                        @elseif ($item['stock'] <= $item['reorder_level'])

                            <flux:badge
                                size="sm"
                                color="yellow"
                            >
                                Low Stock
                            </flux:badge>

                        @else

                            <flux:badge
                                size="sm"
                                color="green"
                            >
                                In Stock
                            </flux:badge>

                        @endif

                    </flux:table.cell>


                    {{-- Actions --}}
                    <flux:table.cell class="py-0">

                        <flux:button
                            variant="ghost"
                            size="sm"
                            icon="ellipsis-horizontal"
                        />

                    </flux:table.cell>

                </flux:table.row>

            @endforeach

        </flux:table.rows>

    </flux:table>

</div>
