<?php

use Livewire\Component;

new class extends Component
{
    public bool $showReturnModal = false;

    public string $date = '';
    public string $productId = '';
    public string $description = '';
    public string $quantity = '';
    public string $unit = '';
    public string $amount = '';
    public string $supplier = '';

    public array $units = [
        'PCS',
        'Box',
        'Set',
        'Sack',
        'Bag',
        'Bottle',
        'Kilo',
        'Meter',
        'Feet',
        'Pairs',
    ];

    public function openReturnModal(): void
    {
        $this->date = date('Y-m-d');
        $this->productId = '';
        $this->description = '';
        $this->quantity = '';
        $this->unit = '';
        $this->amount = '';
        $this->supplier = '';

        $this->showReturnModal = true;
    }

    public function savePurchaseReturn(): void
    {
        $this->validate([
            'date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'numeric', 'min:0'],
            'unit' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'min:0'],
            'supplier' => ['required', 'string', 'max:255'],
        ]);

        // Database saving will be added later.

        $this->showReturnModal = false;
    }
};

?>

<div class="space-y-6">

    {{-- ============================================================
        PAGE HEADER
    ============================================================= --}}
    <div>
        <flux:heading size="xl">
            Purchase Return
        </flux:heading>

        <flux:text class="mt-1">
            View and manage returned stocks from suppliers.
        </flux:text>
    </div>

    <flux:separator />


    {{-- ============================================================
        DATE FILTERS
    ============================================================= --}}
    <div class="space-y-4">

        <div class="flex flex-col gap-3 sm:flex-row sm:items-end">

            {{-- From --}}
            <div class="w-full sm:w-40">
                <flux:input
                    type="date"
                    label="From"
                />
            </div>

            {{-- To --}}
            <div class="w-full sm:w-40">
                <flux:input
                    type="date"
                    label="To"
                />
            </div>

            {{-- Apply Filter --}}
            <flux:button
                variant="primary"
                icon="funnel"
                class="sm:mb-0 mt-5"
                style="margin-top: 25px"
            >
                Apply Filter
            </flux:button>

        </div>

    </div>


    {{-- ============================================================
        TABLE HEADER / ADD BUTTON
    ============================================================= --}}
    <div class="flex items-center justify-between">

        <flux:heading size="lg">
            Purchase Returns
        </flux:heading>

        <flux:button
            variant="primary"
            icon="plus"
            wire:click="openReturnModal"
        >
            Add
        </flux:button>

    </div>


    {{-- ============================================================
        PURCHASE RETURN TABLE
    ============================================================= --}}
    <div class="overflow-x-auto">

        <flux:table>

            <flux:table.columns>

                <flux:table.column>
                    PR No.
                </flux:table.column>

                <flux:table.column>
                    Description
                </flux:table.column>

                <flux:table.column>
                    Qty
                </flux:table.column>

                <flux:table.column>
                    Unit
                </flux:table.column>

                <flux:table.column>
                    Amount
                </flux:table.column>

                <flux:table.column>
                    Supplier
                </flux:table.column>

                <flux:table.column>
                    Date
                </flux:table.column>

                <flux:table.column>
                    Date Edited
                </flux:table.column>

                <flux:table.column>
                </flux:table.column>

            </flux:table.columns>


            <flux:table.rows>

                {{-- Sample Row 1 --}}
                <flux:table.row>

                    <flux:table.cell>
                        <span class="font-medium">
                            RET-0001
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Urea Fertilizer 50kg
                    </flux:table.cell>

                    <flux:table.cell>
                        5
                    </flux:table.cell>

                    <flux:table.cell>
                        Sack
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        ₱9,250.00
                    </flux:table.cell>

                    <flux:table.cell>
                        Agri Supply Co.
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        Sep 18, 2026
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        Sep 18, 2026
                    </flux:table.cell>

                    <flux:table.cell>

                        <flux:dropdown
                            position="bottom"
                            align="end"
                        >

                            <flux:button
                                variant="ghost"
                                size="sm"
                                icon="ellipsis-horizontal"
                            />

                            <flux:menu>

                                <flux:menu.item icon="pencil">
                                    Edit
                                </flux:menu.item>

                                <flux:menu.separator />

                                <flux:menu.item
                                    icon="trash"
                                    variant="danger"
                                >
                                    Delete
                                </flux:menu.item>

                            </flux:menu>

                        </flux:dropdown>

                    </flux:table.cell>

                </flux:table.row>


                {{-- Sample Row 2 --}}
                <flux:table.row>

                    <flux:table.cell>
                        <span class="font-medium">
                            RET-0002
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Insecticide 1L
                    </flux:table.cell>

                    <flux:table.cell>
                        2
                    </flux:table.cell>

                    <flux:table.cell>
                        Bottle
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        ₱1,560.00
                    </flux:table.cell>

                    <flux:table.cell>
                        Greenfield Trading
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        Sep 16, 2026
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        Sep 16, 2026
                    </flux:table.cell>

                    <flux:table.cell>

                        <flux:dropdown
                            position="bottom"
                            align="end"
                        >

                            <flux:button
                                variant="ghost"
                                size="sm"
                                icon="ellipsis-horizontal"
                            />

                            <flux:menu>

                                <flux:menu.item icon="pencil">
                                    Edit
                                </flux:menu.item>

                                <flux:menu.separator />

                                <flux:menu.item
                                    icon="trash"
                                    variant="danger"
                                >
                                    Delete
                                </flux:menu.item>

                            </flux:menu>

                        </flux:dropdown>

                    </flux:table.cell>

                </flux:table.row>


                {{-- Sample Row 3 --}}
                <flux:table.row>

                    <flux:table.cell>
                        <span class="font-medium">
                            RET-0003
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Complete Fertilizer 25kg
                    </flux:table.cell>

                    <flux:table.cell>
                        3
                    </flux:table.cell>

                    <flux:table.cell>
                        Sack
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        ₱3,750.00
                    </flux:table.cell>

                    <flux:table.cell>
                        Agri Supply Co.
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        Sep 14, 2026
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        Sep 15, 2026
                    </flux:table.cell>

                    <flux:table.cell>

                        <flux:dropdown
                            position="bottom"
                            align="end"
                        >

                            <flux:button
                                variant="ghost"
                                size="sm"
                                icon="ellipsis-horizontal"
                            />

                            <flux:menu>

                                <flux:menu.item icon="pencil">
                                    Edit
                                </flux:menu.item>

                                <flux:menu.separator />

                                <flux:menu.item
                                    icon="trash"
                                    variant="danger"
                                >
                                    Delete
                                </flux:menu.item>

                            </flux:menu>

                        </flux:dropdown>

                    </flux:table.cell>

                </flux:table.row>

            </flux:table.rows>

        </flux:table>

    </div>


    {{-- ============================================================
        ADD PURCHASE RETURN MODAL
    ============================================================= --}}
    <flux:modal
        wire:model="showReturnModal"
        class="md:w-[600px]"
    >

        <div class="space-y-6">

            <div>
                <flux:heading size="lg">
                    Add Purchase Return
                </flux:heading>

                <flux:text class="mt-1">
                    Enter the details of the returned stock.
                </flux:text>
            </div>


            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                {{-- Date --}}
                <flux:input
                    wire:model="date"
                    type="date"
                    label="Date"
                />


                {{-- Product ID --}}
                <flux:input
                    wire:model="productId"
                    label="Product ID"
                    placeholder="Auto generated"
                    disabled
                />


                {{-- Description --}}
                <div class="sm:col-span-2">

                    <flux:input
                        wire:model="description"
                        label="Description"
                        placeholder="Enter product description..."
                    />

                </div>


                {{-- Quantity --}}
                <flux:input
                    wire:model="quantity"
                    type="number"
                    label="Quantity"
                    placeholder="0"
                    min="0"
                />


                {{-- Unit --}}
                <flux:select
                    wire:model="unit"
                    label="Unit"
                    placeholder="Select unit"
                >

                    @foreach ($units as $item)

                        <flux:select.option value="{{ $item }}">
                            {{ $item }}
                        </flux:select.option>

                    @endforeach

                </flux:select>


                {{-- Amount --}}
                <flux:input
                    wire:model="amount"
                    type="number"
                    label="Amount"
                    placeholder="0.00"
                    min="0"
                    step="0.01"
                />


                {{-- Supplier --}}
                <flux:input
                    wire:model="supplier"
                    label="Supplier"
                    placeholder="Enter supplier name..."
                />

            </div>


            <div class="flex justify-end gap-2">

                <flux:button
                    variant="ghost"
                    wire:click="$set('showReturnModal', false)"
                >
                    Cancel
                </flux:button>

                <flux:button
                    variant="primary"
                    icon="check"
                    wire:click="savePurchaseReturn"
                >
                    Save
                </flux:button>

            </div>

        </div>

    </flux:modal>

</div>

