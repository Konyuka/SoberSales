<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: null,
    volume: null,
    sku: null,
    bprice: null,
    sprice: null,
    type: null,
    description: null,
});

const addProduct = () => {
    form.post(route('add.product'), {
        onSuccess: () => {
            form.reset();
        }
    })
}

</script>

<template>
    <div>
        <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0"></div>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">

                        <div class="pointer-events-auto w-screen max-w-md">
                            <div class="flex h-full flex-col divide-y divide-gray-200 bg-white shadow-xl">
                                <div class="flex min-h-0 flex-1 flex-col overflow-y-scroll py-6">
                                    <div class="px-4 sm:px-6">
                                        <div class="flex items-start justify-between">
                                            <h2 class="text-base font-semibold leading-6 text-gray-900"
                                                id="slide-over-title">Panel title</h2>
                                            <div class="ml-3 flex h-7 items-center">
                                                <button type="button"
                                                    class="relative rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                    <span class="absolute -inset-2.5"></span>
                                                    <span class="sr-only">Close panel</span>
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative mt-6 flex-1 px-4 sm:px-6">

                                        <div class="my-5 text-center font-bold text-lg">
                                            <h1>Fill the form to add a product</h1>
                                        </div>

                                        <div class="grid grid-cols-1 gap-5">

                                            <div>
                                                <label for="email"
                                                    class="block text-sm font-semibold leading-6 text-black">Product
                                                    Name</label>
                                                <div class="mt-2">
                                                    <input v-model="form.name" type="text" name="name" id="name"
                                                        class="font-extrabold tracking-widest block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm sm:leading-6"
                                                        placeholder="" aria-describedby="email-description">
                                                </div>
                                                <p class="mt-2 text-sm text-red-600" id="email-description">
                                                    {{ form.errors.name }}
                                                </p>
                                            </div>

                                            <div class="flex gap-5">
                                                <div>
                                                    <label for="email"
                                                        class="block text-sm font-semibold leading-6 text-black">Product
                                                        Volume</label>
                                                    <div class="mt-2">
                                                        <input v-model="form.volume" type="number" name="volume" id="volume"
                                                            class="font-extrabold tracking-widest text-center block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm sm:leading-6"
                                                            placeholder="" aria-describedby="email-description">
                                                    </div>
                                                    <p class="mt-2 text-sm text-red-600" id="email-description">
                                                        {{ form.errors.volume }}
                                                    </p>
                                                </div>
                                                <div class="w-full">
                                                    <label for="location"
                                                        class="block text-sm font-semibold leading-6 text-black">Stock
                                                        Keeping unit</label>
                                                    <select v-model="form.sku" id="sku" name="sku"
                                                        class="font-extrabold tracking-widest mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-black ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-gray-900 sm:text-sm sm:leading-6">
                                                        <option value="ml">Milliliters (ML)</option>
                                                        <option value="liters">Liters (L)</option>
                                                    </select>
                                                    <p class="mt-2 text-sm text-red-600" id="email-description">
                                                        {{ form.errors.sku }}
                                                    </p>
                                                </div>
                                            </div>


                                            <div class="flex gap-2">

                                                <div class="w-1/2">
                                                    <label for="email"
                                                        class="block text-sm font-semibold leading-6 text-black">Buying
                                                        Price</label>
                                                    <div class="mt-2 relative">
                                                        <div
                                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                            <span class="text-gray-500 sm:text-sm">$</span>
                                                        </div>
                                                        <input v-model="form.bprice" type="number" name="bprice" id="bprice"
                                                            class="font-extrabold tracking-widest text-center block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm sm:leading-6"
                                                            placeholder="" aria-describedby="email-description">
                                                        <div
                                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                            <span class="text-gray-500 sm:text-sm"
                                                                id="price-currency">KES</span>
                                                        </div>
                                                    </div>
                                                    <p class="mt-2 text-sm text-red-600" id="email-description">
                                                        {{ form.errors.bprice }}
                                                    </p>
                                                </div>
                                                <div class="w-1/2">
                                                    <label for="email"
                                                        class="block text-sm font-semibold leading-6 text-black">Selling
                                                        Price</label>
                                                    <div class="mt-2 relative">
                                                        <div
                                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                            <span class="text-gray-500 sm:text-sm">$</span>
                                                        </div>
                                                        <input v-model="form.sprice" type="number" name="sprice" id="sprice"
                                                            class="font-extrabold tracking-widest text-center block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm sm:leading-6"
                                                            placeholder="" aria-describedby="email-description">
                                                        <div
                                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                            <span class="text-gray-500 sm:text-sm"
                                                                id="price-currency">KES</span>
                                                        </div>
                                                    </div>
                                                    <p class="mt-2 text-sm text-red-600" id="email-description">
                                                        {{ form.errors.sprice }}
                                                    </p>
                                                </div>

                                            </div>

                                            <div>
                                                <label for="location"
                                                    class="block text-sm font-semibold leading-6 text-black">Drink
                                                    Type</label>
                                                <select v-model="form.type" id="type" name="type"
                                                    class="font-extrabold tracking-widest mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-black ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-gray-900 sm:text-sm sm:leading-6">
                                                    <option value="true">Alcoholic</option>
                                                    <option value="false">Non Alcoholic</option>
                                                </select>
                                                <p class="mt-2 text-sm text-red-600" id="email-description">
                                                    {{ form.errors.type }}
                                                </p>
                                            </div>

                                            <div>
                                                <label for="comment"
                                                    class="block text-sm font-semibold leading-6 text-black">Drink
                                                    Description</label>
                                                <div class="mt-2">
                                                    <textarea v-model="form.description" rows="4" name="description"
                                                        id="description"
                                                        class="font-extrabold tracking-widest block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-900 sm:text-sm sm:leading-6"></textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-red-600" id="email-description">
                                                    {{ form.errors.description }}
                                                </p>
                                            </div>



                                        </div>

                                    </div>
                                </div>
                                <div class="flex flex-shrink-0 justify-end px-4 py-4">
                                    <button @click="$emit('closeSlide')" type="button"
                                        class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:ring-gray-400">Cancel</button>
                                    <button @click="addProduct()" type="submit"
                                        class="ml-4 inline-flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>