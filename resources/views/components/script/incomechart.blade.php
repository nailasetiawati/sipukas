<script type="text/javascript">
    var ctx = document.getElementById("incomeChart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @php
            echo json_encode($label);
        @endphp,
        datasets : [{
            label: 'Dana Pemasukan',
            backgroundColor: '#6777ef',
            borderColor: '#93C3D2',
            data: {{ json_encode($totalIncms) }}
        },
        {
            label: 'Dana Pengeluaran',
            backgroundColor: '#fc544b',
            borderColor: '#93C3D2',
            data: {{ json_encode($totalExpns) }}
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
