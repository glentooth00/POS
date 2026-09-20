
<?php

use Livewire\Component;

new class extends Component
{
    public bool $showQaModal = false;

    public string $date = '';
    public string $prNo = '';
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

    public array $items = [
        [
            'id' => 1,
            'pr_no' => 'PR-0001',
            'description' => 'Urea Fertilizer 50kg',
            'quantity' => 5,
            'unit' => 'Sack',
            'amount' => 9250.00,
            'supplier' => 'Agri Supply Co.',
            'date' => 'Sep 18, 2026',
            'date_edited' => 'Sep 18, 2026',
        ],
        [
            'id' => 2,
            'pr_no' => 'PR-0002',
            'description' => 'Insecticide 1L',
            'quantity' => 2,
            'unit' => 'Bottle',
            'amount' => 1560.00,
            'supplier' => 'Greenfield Trading',
            'date' => 'Sep 16, 2026',
            'date_edited' => 'Sep 16, 2026',
        ],
        [
            'id' => 3,
            'pr_no' => 'PR-0003',
            'description' => 'Complete Fertilizer 25kg',
            'quantity' => 3,
            'unit' => 'Sack',
            'amount' => 3750.00,
            'supplier' => 'Agri Supply Co.',
            'date' => 'Sep 14, 2026',
            'date_edited' => 'Sep 15, 2026',
        ],
    ];

    public function openQaModal(): void
    {
        $this->resetValidation();

        $this->date = date('Y-m-d');
        $this->prNo = '';
        $this->description = '';
        $this->quantity = '';
        $this->unit = '';
        $this->amount = '';
        $this->supplier = '';

        $this->showQaModal = true;
    }

    public function saveQaStock(): void
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

        $this->showQaModal = false;
    }

    public function editQaStock(int $id): void
    {
        // Edit functionality will be added later.
    }

    public function printQaStocks(): void
    {
        // Print functionality will be added later.
    }
};
?>

<div class="w-full">

    {{-- ============================================================
        PAGE HEADER
    ============================================================= --}}
    <div class="flex items-start justify-between gap-4">

        <div>
            <flux:heading size="xl">
                QA Stocks
            </flux:heading>

            <flux:text class="mt-2">
                View and manage stocks for quality assurance.
            </flux:text>
        </div>

    </div>


    {{-- ============================================================
        FILTERS
    ============================================================= --}}
    <div class="mt-6 space-y-4">

        <div class="flex flex-col gap-3 sm:flex-row sm:items-end">

            {{-- From Date --}}
            <div
                class="w-full sm:w-auto"
                style="width: 180px"
            >
                <flux:input
                    type="date"
                    label="From"
                />
            </div>

            {{-- To Date --}}
            <div
                class="w-full sm:w-auto"
                style="width: 180px"
            >
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
        TABLE HEADER
    ============================================================= --}}
    <div class="mt-8">

        <div class="flex items-center justify-between gap-4">

            <div>
                <flux:heading size="lg">
                    QA Stocks
                </flux:heading>
            </div>

            <flux:button
                variant="primary"
                icon="plus"
                wire:click="openQaModal"
            >
                Add
            </flux:button>

        </div>


        {{-- ========================================================
            TABLE
        ========================================================= --}}
        <div class="mt-4 overflow-x-auto rounded-lg border border-zinc-200 dark:border-zinc-700">

            <table class="w-full text-sm">

                <thead class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-800/50">
                    <tr>

                        <th class="whitespace-nowrap px-4 py-3 text-left font-medium">
                            PR No.
                        </th>

                        <th class="whitespace-nowrap px-4 py-3 text-left font-medium">
                            Description
                        </th>

                        <th class="whitespace-nowrap px-4 py-3 text-right font-medium">
                            Qty
                        </th>

                        <th class="whitespace-nowrap px-4 py-3 text-left font-medium">
                            Unit
                        </th>

                        <th class="whitespace-nowrap px-4 py-3 text-right font-medium">
                            Amount
                        </th>

                        <th class="whitespace-nowrap px-4 py-3 text-left font-medium">
                            Supplier
                        </th>

                        <th class="whitespace-nowrap px-4 py-3 text-left font-medium">
                            Date
                        </th>

                        <th class="whitespace-nowrap px-4 py-3 text-left font-medium">
                            Date Edited
                        </th>

                        <th class="w-12 px-4 py-3"></th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">

                    @forelse ($items as $item)

                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/40">

                            <td class="whitespace-nowrap px-4 py-3">
                                {{ $item['pr_no'] }}
                            </td>

                            <td class="whitespace-nowrap px-4 py-3">
                                {{ $item['description'] }}
                            </td>

                            <td class="whitespace-nowrap px-4 py-3 text-right">
                                {{ $item['quantity'] }}
                            </td>

                            <td class="whitespace-nowrap px-4 py-3">
                                {{ $item['unit'] }}
                            </td>

                            <td class="whitespace-nowrap px-4 py-3 text-right">
                                ₱{{ number_format($item['amount'], 2) }}
                            </td>

                            <td class="whitespace-nowrap px-4 py-3">
                                {{ $item['supplier'] }}
                            </td>

                            <td class="whitespace-nowrap px-4 py-3">
                                {{ $item['date'] }}
                            </td>

                            <td class="whitespace-nowrap px-4 py-3">
                                {{ $item['date_edited'] }}
                            </td>

                            {{-- Action --}}
                            <td class="px-4 py-3 text-right">

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

                                        <flux:menu.item
                                            icon="pencil"
                                            wire:click="editQaStock({{ $item['id'] }})"
                                        >
                                            Edit
                                        </flux:menu.item>

                                    </flux:menu>

                                </flux:dropdown>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td
                                colspan="9"
                                class="px-4 py-8 text-center text-zinc-500"
                            >
                                No QA stocks found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- ========================================================
            PRINT BUTTON
        ========================================================= --}}
        <div class="mt-4 flex justify-end">

            <flux:button
                variant="outline"
                icon="printer"
                wire:click="printQaStocks"
            >
                Print
            </flux:button>

        </div>

    </div>


    {{-- ============================================================
        ADD QA STOCK MODAL
    ============================================================= --}}
    <flux:modal
        wire:model="showQaModal"
        class="md:w-[600px]"
    >

        <div class="space-y-6">

            <div>
                <flux:heading size="lg">
                    Add QA Stock
                </flux:heading>

                <flux:text class="mt-2">
                    Enter the details of the stock for quality assurance.
                </flux:text>
            </div>


            {{-- Form --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                {{-- Date --}}
                <flux:input
                    wire:model="date"
                    type="date"
                    label="Date"
                />

                {{-- PR No. --}}
                <flux:input
                    wire:model="prNo"
                    label="PR No."
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

                    @foreach ($units as $unitItem)

                        <flux:select.option value="{{ $unitItem }}">
                            {{ $unitItem }}
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


            {{-- Modal Actions --}}
            <div class="flex justify-end gap-2">

                <flux:button
                    variant="ghost"
                    wire:click="$set('showQaModal', false)"
                >
                    Cancel
                </flux:button>

                <flux:button
                    variant="primary"
                    icon="check"
                    wire:click="saveQaStock"
                >
                    Save
                </flux:button>

            </div>

        </div>

    </flux:modal>

</div>
