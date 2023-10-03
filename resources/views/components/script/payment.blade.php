<script type="text/javascript">
    var cdx = document.getElementById("paymentChart").getContext('2d');
    var myChart = new Chart(cdx, {
    type: 'pie',
    data: {
        labels: [
            'Admin',
            'Web',
        ],
        datasets : [{
            label: [
                'Admin',
                'Web',
            ],
            backgroundColor: [
                '#6777ef',
                '#3abaf4',
            ],
            borderColor: [
                '#6777ef',
                '#3abaf4',
            ],
            data: [
                {value: {{ $adminCount }}, name: 'Admin'},
                {value: {{ $webCount }}, name: 'Web'},
            ],
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
