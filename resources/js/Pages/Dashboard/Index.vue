<template>
    <dash-layout>
        <!-- Header -->
        <template #header>
            <h1 class="text-center">Overview</h1>
        </template>

        <template #content>
             <!-- Chart /-->

                
            <apexcharts
                width="500"
                type="pie"
                :options="chartOption"
                :series="series1"
            ></apexcharts>
        </template>
    </dash-layout>
</template>

<script>
import DashLayout from "@/Layouts/DashLayout";
import Chart from '@/Chart/Chart'
import VueApexCharts from "vue-apexcharts";

export default {
    components: {
        DashLayout,
        Chart,
        apexcharts: VueApexCharts,
    },
    data() {
        return {
            chartOptions: {
                chart: {
                    id: "basic-bar",
                   
                },
                xaxis: {
                    categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
                }
            },
            series1: [45, 55, 41, 17, 15],
            chartOption: {
                 labels: ['Apple', 'Mango', 'Orange', 'Watermelon', 'Banana']
            },
        }
    },
};
</script>
