<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resumen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <br>
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <br>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Respuestas de Usuario"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0\" Personas\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: {{$page_reliability[1]}}, label: "Si"},
			{y: {{$page_reliability[2]}}, label: "No"},
			{y: {{$page_reliability[3]}}, label: "Mas o menos"},
		]
	}]
});
chart.render();

}
</script>