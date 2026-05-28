<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    car: Object,
});

const form = useForm({
    name: props.car?.name || "",
    brand: props.car?.brand || "",
    model: props.car?.model || "",
    year: props.car?.year || "",
    car_type: props.car?.car_type || "",
    daily_rent_price: props.car?.daily_rent_price || "",
    image: props.car?.image || "placeholder.png",
    availablity: props.car?.availablity || true,
});

const preview = ref(props.car?.image ? `/storage/${props.car.image}` : null);

const handleImage = (e) => {
    const file = e.target.files[0];

    form.image = file;

    if (file) {
        preview.value = URL.createObjectURL(file);
    }
};

const handleSubmit = () => {
    if (props.car) {
        form.post(route("cars.update", props.car.id));
        return;
    } else {
        form.post(route("cars.store"));
        return;
    }
};
</script>

<template>
    <AdminLayout>
        <template #header-title>
            <h1 class="text-lg font-semibold text-slate-800">
                {{ props.car ? "Edit Car" : "Add New Car" }}
            </h1>
            <p class="text-sm text-slate-400">
                {{
                    props.car
                        ? "Update car details below."
                        : "Fill in the details to add a new car to the fleet."
                }}
            </p>
        </template>

        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-2xl border border-slate-200 p-8">
                <form class="space-y-6" @submit.prevent="handleSubmit">
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label
                                class="block text-sm font-medium text-slate-700 mb-1.5"
                                >Car Name</label
                            >
                            <input
                                v-model="form.name"
                                type="text"
                                placeholder="e.g. Camry"
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            />
                            <div
                                v-if="form.errors.name"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.name }}
                            </div>
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-slate-700 mb-1.5"
                                >Brand</label
                            >
                            <input
                                v-model="form.brand"
                                type="text"
                                placeholder="e.g. Toyota"
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            />
                            <div
                                v-if="form.errors.brand"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.brand }}
                            </div>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label
                                class="block text-sm font-medium text-slate-700 mb-1.5"
                                >Model</label
                            >
                            <input
                                v-model="form.model"
                                type="text"
                                placeholder="e.g. Camry XLE"
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            />
                            <div
                                v-if="form.errors.model"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.model }}
                            </div>
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-slate-700 mb-1.5"
                                >Year of Manufacture</label
                            >
                            <input
                                v-model="form.year"
                                type="number"
                                placeholder="e.g. 2023"
                                min="1900"
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            />
                            <div
                                v-if="form.errors.year"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.year }}
                            </div>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label
                                class="block text-sm font-medium text-slate-700 mb-1.5"
                                >Car Type</label
                            >
                            <input
                                v-model="form.car_type"
                                type="text"
                                placeholder="e.g. 2023"
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            />
                            <div
                                v-if="form.errors.car_type"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.car_type }}
                            </div>
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-slate-700 mb-1.5"
                                >Daily Rent Price ($)</label
                            >
                            <input
                                type="number"
                                v-model="form.daily_rent_price"
                                step="0.01"
                                placeholder="e.g. 75.00"
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            />
                            <div
                                v-if="form.errors.daily_rent_price"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.daily_rent_price }}
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <input
                            v-model="form.availablity"
                            type="checkbox"
                            id="availability"
                            class="w-4 h-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500"
                        />
                        <label
                            for="availability"
                            class="text-sm font-medium text-slate-700"
                            >Available for Rent</label
                        >
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-slate-700 mb-1.5"
                            >Car Image</label
                        >
                        <label
                            for="image"
                            class="border-2 border-dashed border-slate-300 rounded-xl p-8 text-center hover:border-primary-400 transition-colors cursor-pointer block"
                        >
                            <div v-if="preview" class="mb-3">
                                <img
                                    :src="preview"
                                    class="w-full aspect-video bg-gray-100 object-contain rounded-lg border border-primary-600"
                                />
                            </div>
                            <svg
                                v-else
                                class="w-10 h-10 text-slate-300 mx-auto mb-3"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                                />
                            </svg>
                            <span class="text-sm text-slate-500 block">
                                Click to upload or drag and drop
                            </span>
                            <span class="text-xs text-slate-400 mt-1 block">
                                PNG, JPG, GIF up to 2MB
                            </span>
                        </label>
                        <input
                            id="image"
                            name="image"
                            type="file"
                            accept="image/*"
                            @input="handleImage"
                            class="w-full text-sm hidden"
                        />
                        <!-- @input="form.image = $event.target.files[0]" -->

                        <div
                            v-if="form.errors.image"
                            class="text-red-500 text-sm mt-1"
                        >
                            {{ form.errors.image }}
                        </div>
                    </div>

                    <div
                        class="flex items-center gap-3 pt-4 border-t border-slate-100"
                    >
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="px-6 py-3 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 transition-colors shadow-md shadow-primary-500/20"
                            :class="['disabled:opacity-50']"
                        >
                            {{
                                props.car
                                    ? form.processing
                                        ? "Updating..."
                                        : "Update Car"
                                    : form.processing
                                      ? "Adding..."
                                      : "Add Car"
                            }}
                        </button>
                        <Link
                            :href="route('cars.index')"
                            class="px-6 py-3 text-slate-600 text-sm font-medium rounded-xl hover:bg-slate-100 transition-colors"
                            >Cancel</Link
                        >
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
