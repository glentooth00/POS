
<?php

use Livewire\Component;

new class extends Component
{
    //
};

?>

<div class="space-y-6">

    {{-- ============================================================
        PAGE HEADER
    ============================================================= --}}
    <div>
        <flux:heading size="xl">
            Stock Inventory
        </flux:heading>

        <flux:text class="mt-1">
            View and monitor the current stock on hand for all products.
        </flux:text>
    </div>

    <flux:separator />


    {{-- ============================================================
        FILTERS
    ============================================================= --}}
    <div class="space-y-4">

        <div class="flex flex-col gap-3 sm:flex-row sm:items-end">

            {{-- Description --}}
            <div
                class="w-full"
                style="width: 300px"
            >
                <flux:input
                    label="Description"
                    placeholder="Description..."
                    icon="magnifying-glass"
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

            {{-- Category --}}
            <div
                class="flex items-center gap-4 mt-5"
                style="margin-top: 25px"
            >

                <flux:checkbox
                    label="Category"
                />

                <flux:select
                    placeholder="Category"
                    class="w-28"
                    style="margin-left:33px"
                >
                    <flux:select.option value="fertilizer">
                        Fertilizer
                    </flux:select.option>

                    <flux:select.option value="chemical">
                        Chemical
                    </flux:select.option>

                    <flux:select.option value="seeds">
                        Seeds
                    </flux:select.option>
                </flux:select>

            </div>

            {{-- Critical Stocks --}}
            <div
                class="mt-5"
                style="margin-top: 25px;"
            >
                <flux:input
                    type="number"
                    placeholder="Critical"
                    min="0"
                    class="w-16"
                />
            </div>

        </div>

    </div>


    {{-- ============================================================
        STOCK INVENTORY TABLE
    ============================================================= --}}
    <div class="overflow-x-auto">

        <flux:table>

            <flux:table.columns>

                <flux:table.column>
                    Product ID
                </flux:table.column>

                <flux:table.column>
                    Description
                </flux:table.column>

                <flux:table.column>
                    Category
                </flux:table.column>

                <flux:table.column>
                    Price
                </flux:table.column>

                <flux:table.column>
                    Stock on Hand
                </flux:table.column>

                <flux:table.column>
                    Units
                </flux:table.column>

            </flux:table.columns>


            <flux:table.rows>

                {{-- Sample Row 1 --}}
                <flux:table.row>

                    <flux:table.cell>
                        <span class="font-medium">
                            PRD-0001
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Urea Fertilizer 50kg
                    </flux:table.cell>

                    <flux:table.cell>
                        <flux:badge size="sm">
                            Fertilizer
                        </flux:badge>
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        ₱1,850.00
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        <span class="font-medium">
                            25
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Sack
                    </flux:table.cell>

                </flux:table.row>


                {{-- Sample Row 2 --}}
                <flux:table.row>

                    <flux:table.cell>
                        <span class="font-medium">
                            PRD-0002
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Insecticide 1L
                    </flux:table.cell>

                    <flux:table.cell>
                        <flux:badge size="sm">
                            Chemical
                        </flux:badge>
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        ₱780.00
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        <span class="font-medium">
                            8
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Bottle
                    </flux:table.cell>

                </flux:table.row>


                {{-- Sample Row 3 --}}
                <flux:table.row>

                    <flux:table.cell>
                        <span class="font-medium">
                            PRD-0003
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Hybrid Rice Seeds 20kg
                    </flux:table.cell>

                    <flux:table.cell>
                        <flux:badge size="sm">
                            Seeds
                        </flux:badge>
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        ₱2,450.00
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        <span class="font-medium">
                            42
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Bag
                    </flux:table.cell>

                </flux:table.row>


                {{-- Sample Row 4 --}}
                <flux:table.row>

                    <flux:table.cell>
                        <span class="font-medium">
                            PRD-0004
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Complete Fertilizer 25kg
                    </flux:table.cell>

                    <flux:table.cell>
                        <flux:badge size="sm">
                            Fertilizer
                        </flux:badge>
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        ₱1,250.00
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        <span class="font-medium text-red-600">
                            3
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Sack
                    </flux:table.cell>

                </flux:table.row>


                {{-- Sample Row 5 --}}
                <flux:table.row>

                    <flux:table.cell>
                        <span class="font-medium">
                            PRD-0005
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Herbicide 500ml
                    </flux:table.cell>

                    <flux:table.cell>
                        <flux:badge size="sm">
                            Chemical
                        </flux:badge>
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        ₱520.00
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        <span class="font-medium">
                            15
                        </span>
                    </flux:table.cell>

                    <flux:table.cell>
                        Bottle
                    </flux:table.cell>

                </flux:table.row>

            </flux:table.rows>

        </flux:table>

    </div>


    {{-- ============================================================
        PRINT
    ============================================================= --}}
    <div class="flex justify-end pt-2">

        <flux:button
            variant="primary"
            icon="printer"
        >
            Print
        </flux:button>

    </div>

</div>
