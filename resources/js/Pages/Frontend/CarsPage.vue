<script setup>
import CarList from "@/Components/Car/CarList.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { router, usePage } from "@inertiajs/vue3";
import { reactive, ref } from "vue";

const page = usePage();
const cars = page.props.cars;

const filters = reactive({
    car_type: page.props.filters?.car_type || "",
    brand: page.props.filters?.brand || "",
    min_price: page.props.filters?.min_price || "",
    max_price: page.props.filters?.max_price || "",
});

const sort = ref("");

const applyFilters = () => {
    router.get(
        "/cars",
        { ...filters, sort: sort.value },
        {
            preserveState: true,
            replace: true,
        },
    );
};

const clearFilters = () => {
    filter.car_type = "";
    filter.brand = "";
    filter.min_price = "";
    filter.max_price = "";
    // filter.sort = "";

    router.get("/cars");
};

const changeSort = () => {
    router.get(
        "/cars",
        {
            ...filters,
            sort: sort.value,
        },
        {
            preserveState: true,
            replace: true,
        },
    );
};
</script>

<template>
    <GuestLayout>
        <!-- Page Header -->
        <section
            class="bg-gradient-to-br from-surface-dark via-primary-900 to-surface-dark py-20"
        >
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <span
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-500/15 text-primary-300 text-xs font-semibold uppercase tracking-wider mb-4"
                    >Our Fleet</span
                >
                <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">
                    Browse Available Cars
                </h1>
                <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                    Find the perfect car for your journey with our wide
                    selection.
                </p>
            </div>
        </section>

        <section class="py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Filters -->
                <div
                    class="bg-white rounded-2xl border border-slate-200 p-6 mb-10 shadow-sm"
                >
                    <div class="flex items-center gap-2 mb-4">
                        <svg
                            class="w-5 h-5 text-slate-400"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"
                            />
                        </svg>
                        <span class="text-sm font-semibold text-slate-700"
                            >Filters</span
                        >
                    </div>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label
                                class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wider"
                                >Car Type</label
                            >
                            <select
                                v-model="filters.car_type"
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white"
                            >
                                <option value="">All Types</option>
                                <option value="sedan">Sedan</option>
                                <option value="suv">SUV</option>
                                <option value="sports">Sports</option>
                                <option value="luxury">Luxury</option>
                                <option value="hatchback">Hatchback</option>
                                <option value="van">Van</option>
                            </select>
                        </div>
                        <div>
                            <label
                                class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wider"
                                >Brand</label
                            >
                            <select
                                v-model="filters.brand"
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white"
                            >
                                <option value="">All Brands</option>
                                <option value="toyota">Toyota</option>
                                <option value="honda">Honda</option>
                                <option value="tesla">Tesla</option>
                                <option value="ford">Ford</option>
                                <option value="bmw">BMW</option>
                            </select>
                        </div>
                        <div>
                            <label
                                class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wider"
                                >Min Price</label
                            >
                            <input
                                v-model="filters.min_price"
                                type="number"
                                placeholder="$0"
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            />
                        </div>
                        <div>
                            <label
                                class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wider"
                                >Max Price</label
                            >
                            <input
                                v-model="filters.max_price"
                                type="number"
                                placeholder="$500"
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            />
                        </div>
                    </div>
                    <div class="flex gap-3 mt-4">
                        <button
                            @click="applyFilters"
                            class="px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 transition-colors"
                        >
                            Apply Filters
                        </button>
                        <button
                            @click="clearFilters"
                            class="px-6 py-2.5 text-slate-600 text-sm font-medium rounded-xl hover:bg-slate-100 transition-colors"
                        >
                            Clear All
                        </button>
                    </div>
                </div>

                <!-- Results Info -->
                <div class="flex items-center justify-between mb-6">
                    <p class="text-sm text-slate-500">
                        Showing
                        <strong class="text-slate-700">{{}}</strong> cars
                    </p>
                    <select
                        v-model="sort"
                        @change="changeSort"
                        class="px-3 py-2 rounded-lg border border-slate-300 text-sm text-slate-600 focus:outline-none"
                    >
                        <option value="">Sort: Recommended</option>
                        <option value="low_high">Price: Low to High</option>
                        <option value="high_low">Price: High to Low</option>
                        <option value="newest">Newest First</option>
                    </select>
                </div>

                <CarList :cars="cars" />
            </div>
        </section>
    </GuestLayout>
</template>
