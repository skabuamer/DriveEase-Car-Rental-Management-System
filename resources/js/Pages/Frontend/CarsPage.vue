<script setup>
import CarList from "@/Components/Car/CarList.vue";
import Select from "@/Components/ui/select/Select.vue";
import SelectContent from "@/Components/ui/select/SelectContent.vue";
import SelectGroup from "@/Components/ui/select/SelectGroup.vue";
import SelectItem from "@/Components/ui/select/SelectItem.vue";
import SelectTrigger from "@/Components/ui/select/SelectTrigger.vue";
import SelectValue from "@/Components/ui/select/SelectValue.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, router, usePage } from "@inertiajs/vue3";
import { computed, reactive, ref } from "vue";

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
    filters.car_type = "";
    filters.brand = "";
    filters.min_price = "";
    filters.max_price = "";
    // filter.sort = "";

    // router.get("/cars");
    router.get(
        "/cars",
        { ...filters, sort: sort.value },
        {
            preserveState: true,
            replace: true,
        },
    );
};

const activeFilters = computed(() => {
    const labels = {
        car_type: "Car Type",
        brand: "Brand",
        min_price: "Min Price",
        max_price: "Max Price",
    };

    const serverFilters = page.props.filters || {};

    return Object.keys(labels)
        .filter((key) => serverFilters[key] && serverFilters[key] !== "")
        .map((key) => ({
            key,
            label: labels[key],
            value: serverFilters[key],
        }));
});

const removeFilter = (key) => {
    filters[key] = "";
    applyFilters();
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
    <Head title="Cars" />
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

                            <Select v-model="filters.car_type">
                                <SelectTrigger class="w-full h-10.5!">
                                    <SelectValue placeholder="All Types" />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectGroup>
                                        <SelectItem>All Types</SelectItem>
                                        <SelectItem value="sedan"
                                            >Sedan</SelectItem
                                        >
                                        <SelectItem value="suv">SUV</SelectItem>
                                        <SelectItem value="sports"
                                            >Sports</SelectItem
                                        >
                                        <SelectItem value="luxury"
                                            >Luxury</SelectItem
                                        >
                                        <SelectItem value="hatchback"
                                            >Hatchback</SelectItem
                                        >
                                        <SelectItem value="van">Van</SelectItem>
                                    </SelectGroup>
                                </SelectContent>
                            </Select>
                        </div>
                        <div>
                            <label
                                class="block text-xs font-medium text-slate-500 mb-1.5 uppercase tracking-wider"
                                >Brand</label
                            >

                            <Select v-model="filters.brand">
                                <SelectTrigger class="w-full h-10.5!">
                                    <SelectValue placeholder="All Types" />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectGroup>
                                        <SelectItem>All Brands</SelectItem>
                                        <SelectItem value="toyota"
                                            >Toyota</SelectItem
                                        >
                                        <SelectItem value="honda"
                                            >Honda</SelectItem
                                        >
                                        <SelectItem value="tesla"
                                            >Tesla</SelectItem
                                        >
                                        <SelectItem value="ford"
                                            >Ford</SelectItem
                                        >
                                        <SelectItem value="bmw">BMW</SelectItem>
                                    </SelectGroup>
                                </SelectContent>
                            </Select>
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
                                class="w-full px-3.5 py-2.5 rounded-md border border-input text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
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
                                class="w-full px-3.5 py-2.5 rounded-xl border border-input text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
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

                        <div
                            class="flex items-center gap-3"
                            v-if="activeFilters.length > 0"
                        >
                            <span class="text-sm text-gray-500 mr-1"
                                >Active Filters:</span
                            >

                            <div
                                v-for="filter in activeFilters"
                                :key="filter.key"
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 text-sm font-medium rounded-full border border-gray-200 dark:border-gray-700"
                            >
                                <span
                                    >{{ filter.label }}:
                                    {{ filter.value }}</span
                                >

                                <button
                                    type="button"
                                    @click="removeFilter(filter.key)"
                                    class="text-gray-400 hover:text-red-600 dark:hover:text-gray-300 rounded-full p-0.5 inline-flex items-center justify-center focus:outline-none transition-colors"
                                    aria-label="Remove filter"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-3.5 w-3.5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Results Info -->
                <div class="flex items-center justify-between mb-6">
                    <p class="text-sm text-slate-500">
                        Showing
                        <strong class="text-slate-700">{{
                            $page.props.cars.length
                        }}</strong>
                        cars
                    </p>

                    <Select v-model="sort" @update:model-value="changeSort">
                        <SelectTrigger class="h-10.5!">
                            <SelectValue placeholder="Sort: Recommended" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectItem>Recommended</SelectItem>
                                <SelectItem value="low_high"
                                    >Price: Low to High</SelectItem
                                >
                                <SelectItem value="high_low"
                                    >Price: High to Low</SelectItem
                                >
                                <SelectItem value="newest"
                                    >Newest First</SelectItem
                                >
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>

                <CarList :cars="cars" />
            </div>
        </section>
    </GuestLayout>
</template>
