<script setup>
defineProps({
    affiliates: Array,
})
</script>

<template>
    <div class="bg-white flex flex-col items-center justify-center min-h-screen">
        <h1 class="text-slate-500 text-2xl font-semibold mb-4 decoration-sky-400">Affiliates Within 100km of HQ</h1>
        <table class="shadow-lg bg-white table-auto">
            <thead>
                <tr>
                    <th class="bg-slate-200 border text-left px-8 py-4">Affiliate ID</th>
                    <th class="bg-slate-200 border text-left px-8 py-4">Affiliate Name</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(affiliate, id) in affiliates" class="hover:bg-gray-50 focus:bg-gray-300 active:bg-red-200" tabindex="0">
                    <td class="border px-8 py-4">{{ id }}</td>
                    <td class="border px-8 py-4">{{ affiliate }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
