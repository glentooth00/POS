<x-layouts::app :title="__('Dashboard')">

    <div class="flex h-full w-full flex-1 flex-col gap-6">

        {{-- Header --}}
        <div>
            <flux:heading size="xl">
                Dashboard
            </flux:heading>

            <flux:text class="mt-1">
                Overview of your POS system.
            </flux:text>
        </div>


        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-2">

            {{-- Total Sales --}}
            <flux:card class="p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <flux:text size="sm" class="text-zinc-500">
                            Total Sales
                        </flux:text>

                        <flux:heading size="lg" class="mt-1">
                            ₱2,881,000
                        </flux:heading>

                        <flux:text size="sm" class="mt-1 text-green-600">
                            +12.5% this month
                        </flux:text>
                    </div>

                    <div class="rounded-lg bg-blue-50 p-3 dark:bg-blue-950">
                        <flux:icon
                            name="banknotes"
                            class="size-6 text-blue-600"
                        />
                    </div>

                </div>

            </flux:card>


            {{-- Transactions --}}
            <flux:card class="p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <flux:text size="sm" class="text-zinc-500">
                            Transactions
                        </flux:text>

                        <flux:heading size="lg" class="mt-1">
                            8,426
                        </flux:heading>

                        <flux:text size="sm" class="mt-1 text-green-600">
                            +8.2% this month
                        </flux:text>
                    </div>

                    <div class="rounded-lg bg-green-50 p-3 dark:bg-green-950">
                        <flux:icon
                            name="receipt-percent"
                            class="size-6 text-green-600"
                        />
                    </div>

                </div>

            </flux:card>


            {{-- Inventory --}}
            <flux:card class="p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <flux:text size="sm" class="text-zinc-500">
                            Inventory Items
                        </flux:text>

                        <flux:heading size="lg" class="mt-1">
                            1,248
                        </flux:heading>

                        <flux:text size="sm" class="mt-1">
                            Active items
                        </flux:text>
                    </div>

                    <div class="rounded-lg bg-purple-50 p-3 dark:bg-purple-950">
                        <flux:icon
                            name="cube"
                            class="size-6 text-purple-600"
                        />
                    </div>

                </div>

            </flux:card>


            {{-- Low Stock --}}
            <flux:card class="p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <flux:text size="sm" class="text-zinc-500">
                            Low Stock
                        </flux:text>

                        <flux:heading size="lg" class="mt-1">
                            12
                        </flux:heading>

                        <flux:text size="sm" class="mt-1 text-red-600">
                            Items need attention
                        </flux:text>
                    </div>

                    <div class="rounded-lg bg-red-50 p-3 dark:bg-red-950">
                        <flux:icon
                            name="exclamation-triangle"
                            class="size-6 text-red-600"
                        />
                    </div>

                </div>

            </flux:card>

        </div>


{{-- Sales Chart --}}
<flux:card class="p-6">

    {{-- Chart Header --}}
    <div class="flex items-center justify-between mb-6">

        <div>
            <flux:heading size="lg">
                Sales Overview
            </flux:heading>

            <flux:text class="mt-1">
                Monthly sales performance for 2026.
            </flux:text>
        </div>

        <flux:badge color="green">
            +12.5%
        </flux:badge>

    </div>


    @php

        /*
        |--------------------------------------------------------------------------
        | Dummy Sales Data
        |--------------------------------------------------------------------------
        */

        $sales = [
            ['month' => 'Jan', 'amount' => 142500],
            ['month' => 'Feb', 'amount' => 178200],
            ['month' => 'Mar', 'amount' => 156800],
            ['month' => 'Apr', 'amount' => 214500],
            ['month' => 'May', 'amount' => 238700],
            ['month' => 'Jun', 'amount' => 195300],
            ['month' => 'Jul', 'amount' => 267400],
            ['month' => 'Aug', 'amount' => 289600],
            ['month' => 'Sep', 'amount' => 243800],
            ['month' => 'Oct', 'amount' => 318500],
            ['month' => 'Nov', 'amount' => 342700],
            ['month' => 'Dec', 'amount' => 385900],
        ];

        $maxSales = 400000;

    @endphp


    {{-- Chart --}}
    <div class="w-full">

        {{-- Y Axis + Graph --}}
        <div class="flex w-full">

            {{-- Y Axis --}}
            <div class="flex h-[320px] w-16 shrink-0 flex-col justify-between pb-0 pr-3 text-right">

                <flux:text size="xs" class="text-zinc-400">
                    ₱400K
                </flux:text>

                <flux:text size="xs" class="text-zinc-400">
                    ₱300K
                </flux:text>

                <flux:text size="xs" class="text-zinc-400">
                    ₱200K
                </flux:text>

                <flux:text size="xs" class="text-zinc-400">
                    ₱100K
                </flux:text>

                <flux:text size="xs" class="text-zinc-400">
                    ₱0
                </flux:text>

            </div>


            {{-- Graph --}}
            <div class="relative flex-1">

                {{-- Grid Lines --}}
                <div class="pointer-events-none absolute inset-0 flex flex-col justify-between">

                    <div class="border-t border-zinc-200 dark:border-zinc-700"></div>

                    <div class="border-t border-zinc-200 dark:border-zinc-700"></div>

                    <div class="border-t border-zinc-200 dark:border-zinc-700"></div>

                    <div class="border-t border-zinc-200 dark:border-zinc-700"></div>

                    <div class="border-t border-zinc-300 dark:border-zinc-600"></div>

                </div>


                {{-- Bars --}}
                <div class="relative flex h-[320px] items-end gap-2 px-2 sm:gap-4 sm:px-4">

                    @foreach ($sales as $sale)

                        @php
                            $height = max(
                                12,
                                ($sale['amount'] / $maxSales) * 300
                            );
                        @endphp


                        <div class="group flex h-full flex-1 items-end justify-center">

                            <div class="relative flex w-full justify-center">

                                {{-- Hover Value --}}
                                <div
                                    class="absolute bottom-full left-1/2 mb-2 hidden -translate-x-1/2 whitespace-nowrap rounded-md bg-zinc-900 px-2.5 py-1.5 text-xs font-medium text-white shadow-lg group-hover:block"
                                >
                                    ₱{{ number_format($sale['amount'], 0) }}
                                </div>


                                {{-- Bar --}}
                                <div
                                    class="w-full max-w-10 rounded-t-md bg-blue-600 transition-all duration-300 hover:bg-blue-700 sm:max-w-14"
                                    style="height: {{ $height }}px;"
                                ></div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>


        {{-- Month Labels --}}
        <div class="flex">

            {{-- Empty space matching Y axis --}}
            <div class="w-16 shrink-0"></div>


            {{-- Months --}}
            <div class="flex flex-1 gap-2 px-2 sm:gap-4 sm:px-4">

                @foreach ($sales as $sale)

                    <div class="flex-1 text-center">

                        <flux:text
                            size="sm"
                            class="text-zinc-500"
                        >
                            {{ $sale['month'] }}
                        </flux:text>

                    </div>

                @endforeach

            </div>

        </div>

    </div>


    {{-- Chart Footer --}}
    <div class="mt-6 flex items-center justify-between border-t border-zinc-200 pt-4 dark:border-zinc-700">

        <flux:text size="sm" class="text-zinc-500">
            Total Sales
        </flux:text>

        <flux:text class="font-semibold">
            ₱2,974,900
        </flux:text>

    </div>

</flux:card>




        {{-- Bottom Section --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">


            {{-- User Activity --}}
            <flux:card class="p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <flux:heading size="lg">
                            User Activity
                        </flux:heading>

                        <flux:text class="mt-1">
                            Recent activity from system users.
                        </flux:text>

                    </div>

                    <flux:button
                        variant="ghost"
                        size="sm"
                    >
                        View All
                    </flux:button>

                </div>


                @php

                    $activities = [
                        [
                            'name' => 'Juan Dela Cruz',
                            'action' => 'Processed a sale',
                            'details' => 'Transaction #POS-1025',
                            'time' => '5 minutes ago',
                        ],
                        [
                            'name' => 'Maria Santos',
                            'action' => 'Added inventory',
                            'details' => 'Coca-Cola 1.5L × 50',
                            'time' => '18 minutes ago',
                        ],
                        [
                            'name' => 'Ana Garcia',
                            'action' => 'Updated inventory',
                            'details' => 'Piattos Cheese',
                            'time' => '32 minutes ago',
                        ],
                        [
                            'name' => 'Pedro Cruz',
                            'action' => 'Logged in',
                            'details' => 'Cashier account',
                            'time' => '1 hour ago',
                        ],
                        [
                            'name' => 'Juan Dela Cruz',
                            'action' => 'Added new user',
                            'details' => 'Michael Reyes',
                            'time' => '2 hours ago',
                        ],
                    ];

                @endphp


                <div class="mt-6 divide-y divide-zinc-200 dark:divide-zinc-700">

                    @foreach ($activities as $activity)

                        <div class="flex items-center gap-3 py-4 first:pt-0 last:pb-0">

                            <flux:avatar
                                size="sm"
                                name="{{ $activity['name'] }}"
                            />

                            <div class="min-w-0 flex-1">

                                <div class="flex items-start justify-between gap-3">

                                    <div>

                                        <flux:text class="font-medium">
                                            {{ $activity['name'] }}
                                        </flux:text>

                                        <flux:text size="sm">
                                            {{ $activity['action'] }}
                                        </flux:text>

                                        <flux:text
                                            size="sm"
                                            class="text-zinc-500"
                                        >
                                            {{ $activity['details'] }}
                                        </flux:text>

                                    </div>

                                    <flux:text
                                        size="sm"
                                        class="whitespace-nowrap text-zinc-400"
                                    >
                                        {{ $activity['time'] }}
                                    </flux:text>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </flux:card>


            {{-- Low Stock Items --}}
            <flux:card class="p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <flux:heading size="lg">
                            Low Stock Items
                        </flux:heading>

                        <flux:text class="mt-1">
                            Items that are almost out of stock.
                        </flux:text>

                    </div>

                    <flux:badge
                        color="red"
                        size="sm"
                    >
                        4 Items
                    </flux:badge>

                </div>


                @php

                    $lowStockItems = [
                        [
                            'name' => 'Piattos Cheese',
                            'sku' => 'PIA-001',
                            'stock' => 8,
                            'reorder' => 10,
                            'unit' => 'pcs',
                        ],
                        [
                            'name' => 'Century Tuna 155g',
                            'sku' => 'CNT-155',
                            'stock' => 5,
                            'reorder' => 10,
                            'unit' => 'pcs',
                        ],
                        [
                            'name' => 'Lucky Me Pancit Canton',
                            'sku' => 'LMC-001',
                            'stock' => 3,
                            'reorder' => 10,
                            'unit' => 'pcs',
                        ],
                        [
                            'name' => 'Nescafe Classic 25g',
                            'sku' => 'NES-025',
                            'stock' => 7,
                            'reorder' => 10,
                            'unit' => 'pcs',
                        ],
                    ];

                @endphp


                <div class="mt-6 space-y-3">

                    @foreach ($lowStockItems as $item)

                        <div class="flex items-center justify-between rounded-lg border border-zinc-200 p-3 dark:border-zinc-700">

                            <div class="flex items-center gap-3">

                                <div class="flex size-10 items-center justify-center rounded-lg bg-red-50 dark:bg-red-950">

                                    <flux:icon
                                        name="cube"
                                        class="size-5 text-red-600"
                                    />

                                </div>


                                <div>

                                    <flux:text class="font-medium">
                                        {{ $item['name'] }}
                                    </flux:text>

                                    <flux:text
                                        size="sm"
                                        class="text-zinc-500"
                                    >
                                        {{ $item['sku'] }}
                                    </flux:text>

                                </div>

                            </div>


                            <div class="text-right">

                                <flux:badge
                                    size="sm"
                                    color="yellow"
                                >
                                    {{ $item['stock'] }} {{ $item['unit'] }}
                                </flux:badge>

                                <flux:text
                                    size="sm"
                                    class="mt-1 text-zinc-400"
                                >
                                    Reorder: {{ $item['reorder'] }}
                                </flux:text>

                            </div>

                        </div>

                    @endforeach

                </div>

            </flux:card>

        </div>

    </div>

</x-layouts::app>
