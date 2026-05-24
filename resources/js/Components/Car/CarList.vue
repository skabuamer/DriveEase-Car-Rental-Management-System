<script setup>
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();
</script>

<template>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Car Card 1 -->
        <div
            v-for="car in page.props.cars"
            :key="car.id"
            class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden group hover:shadow-lg hover:shadow-slate-200/60 transition-all duration-300"
        >
            <div
                class="relative h-48 bg-linear-to-br from-slate-100 to-slate-50 flex items-center justify-center overflow-hidden"
            >
                <!-- <span
                                class="text-7xl group-hover:scale-110 transition-transform duration-500"
                                >🚗</span
                            > -->
                <img :src="`/storage/${car.image}`" alt="Image" />
                <span
                    :class="[
                        'absolute top-3 left-3 px-2.5 py-1 text-xs font-semibold rounded-lg',
                        car.availablity
                            ? 'bg-green-100 text-green-700'
                            : 'bg-red-100 text-red-700',
                    ]"
                    >{{ car.availablity ? "Available" : "Not Available" }}</span
                >
                <span
                    class="absolute top-3 right-3 px-2.5 py-1 bg-slate-100 text-slate-600 text-xs font-medium rounded-lg"
                    >{{ car.car_type }}</span
                >
            </div>
            <div class="p-5">
                <div class="flex items-start justify-between mb-1">
                    <h3 class="text-lg font-bold text-slate-900">
                        {{ car.name }}
                    </h3>
                </div>
                <p class="text-sm text-slate-500 mb-3">
                    {{ car.model }} • {{ car.year }}
                </p>
                <div
                    class="flex items-center justify-between pt-4 border-t border-slate-100"
                >
                    <p class="text-xl font-extrabold text-primary-600">
                        ${{ car.daily_rent_price
                        }}<span class="text-sm font-normal text-slate-400"
                            >/day</span
                        >
                    </p>
                    <Link
                        :href="route('cars.show', car.id)"
                        class="px-4 py-2 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 transition-colors"
                        >Book Now</Link
                    >
                </div>
            </div>
        </div>
    </div>
</template>
