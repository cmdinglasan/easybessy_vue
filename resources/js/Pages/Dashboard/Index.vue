<template>
    <dash-layout>
        <!-- Header -->
        <template #header>
            <h1 class="text-center">Overview</h1>
        </template>

        <template #content>
             <Chart />
        </template>
    </dash-layout>
</template>

<script>
import DashLayout from "@/Layouts/DashLayout";
import Chart from '@/Chart/Chart'

export default {
    components: {
        DashLayout,
        Chart
    }
};
</script>
