<script type="text/javascript">
    var ctx = document.getElementById("profitChart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: @php
            echo json_encode($label);
        @endphp,
        datasets : [{
            label: 'Selisih',
            backgroundColor: '#ffa426',
            borderColor: '#ff9400',
            data: {{ json_encode($totalProfits) }}
        }],
        options: {
            animation: {
                onProgress: function (animation) {
                    progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                }
            }
        }
    }
})
</script>
