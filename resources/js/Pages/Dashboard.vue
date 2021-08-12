<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
        </template>

        <div v-show="!user.isRegistered" class="max-w-md mt-12 mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
          <div class="md:flex">
            <div class="md:flex-shrink-0">
              <img class="h-48 w-full object-cover md:h-full md:w-48" src="https://images.unsplash.com/photo-1588196749597-9ff075ee6b5b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=667&q=80" alt="A laptop for online streaming">
            </div>
            <div class="p-8">
              <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">You're a click away from completing your regitration</div>

              <a href="/initializepayment" class="flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-5 border border-blue-700 rounded">
                  MAKE PAYMENT
              </a>

              <p class="bg-white flex mx-auto max-w-7xl" v-show="paymentsuccessful">
                  Thank you, Your payment has been recieved
                  <link class="flex bg-pink-600 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-5 border border-blue-700 rounded" rel="stylesheet" type="text/css" href="/updateprofile">
              </p>

            </div>
          </div>
        </div>

        <div v-show="user.isRegistered" class="p-8 bg-yellow-800">
            <h3 class="text-xl text-white text-center">Thank you, for reserving a seat.</h3>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { computed } from 'vue'
import { Head, Link, usePage } from '@inertiajs/inertia-vue3';

export default {
    setup() {
        const user = computed(() => usePage().props.value.auth.user)
        return { user }
    },
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link
    },

    props: {
        paymentsuccessful: {default: false},
    },
}
</script>
