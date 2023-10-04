<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div>

        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                    alt="Your Company">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Sign in to your account
                </h2>
            </div>

            <div>
                <div v-if="status" class="mb-4 font-medium text-sm text-white">
                    {{ status }}
                </div>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" @submit.prevent="submit()">
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-white">Email address</label>
                        <div class="mt-2">
                            <input v-model="form.email" id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                        </div>
                        <p class="mt-2 text-red-600">{{  form.errors.email  }} </p>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-white">Password</label>
                            <div class="text-sm">
                                <Link :href="route('password.request')"
                                    class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot password?</Link>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input v-model="form.password" id="password" name="password" type="password" autocomplete="current-password" required
                                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                        </div>
                        <p class="mt-2 text-red-600">{{ form.errors.password }} </p>
                    </div>

                    <div class="flex items-center">
                        <input v-model="form.remember" id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="remember-me" class="ml-3 block text-sm leading-6 text-white">Remember me</label>
                    </div>

                    <div>
                        <button type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                            class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                            Sign in
                        </button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-400">
                    Not a member?
                    <Link :href="route('register')" class="font-semibold leading-6 text-indigo-400 hover:text-indigo-300">
                    Register here
                    </Link>
                </p>
            </div>
        </div>

    </div>
</template>
