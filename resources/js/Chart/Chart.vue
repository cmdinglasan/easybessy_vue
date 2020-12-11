<template>
    <!-- This is an example component -->
    <div class="mx-10 pt-15 ">
        <div class="grid gap-6 mb-8 md:grid-cols-2 ml-24">
            <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Revenue
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                    <apexcharts
                        width="500"
                        type="line"
                        :options="chartOptions"
                        :series="series"
                    ></apexcharts>
                </p>
            </div>
            <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Revenue
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                    <apexcharts
                        width="500"
                        type="area"
                        :options="chartOptions"
                        :series="series"
                    ></apexcharts>
                </p>
            </div>
            <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Revenue
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                    <apexcharts
                        width="500"
                        type="bar"
                        :options="chartOptions"
                        :series="series"
                    ></apexcharts>
                </p>
            </div>
            <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Revenue
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                    <apexcharts
                        width="500"
                        type="pie"
                        :options="chartOption"
                        :series="series1"
                    ></apexcharts>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";

var sparklineData = [
    47,
    45,
    54,
    38,
    56,
    24,
    65,
    31,
    37,
    39,
    62,
    51,
    35,
    41,
    35,
    27,
    93,
    53,
    61,
    27,
    54,
    43,
    19,
    46
];
var randomizeArray = function(arg) {
    var array = arg.slice();
    var currentIndex = array.length,
        temporaryValue,
        randomIndex;

    while (0 !== currentIndex) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
};
export default {
    name: "Chart",
    components: {
        apexcharts: VueApexCharts
    },
    data: function() {
        return {
            chartOptions: {
                chart: {
                    id: "basic-bar",
                   
                },
                xaxis: {
                    categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
                }
            },
            series: [
                {
                    name: "series-1",
                    data: randomizeArray(sparklineData)
                }
            ],
            series1: [45, 55, 41, 17, 15],
            chartOption: {
                 labels: ['Apple', 'Mango', 'Orange', 'Watermelon', 'Banana']
            },
            price: [
                {
                    name: "sales",

                    data: randomizeArray(sparklineData)
                }
            ]
        };
    }
};
</script>
