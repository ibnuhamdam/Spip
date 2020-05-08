<script>
    // Total user
    var ctx = document.getElementById("percent-chart");
    if (ctx) {
      ctx.height = 280;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: "My First dataset",
              data: [<?= $total_user; ?>, <?= $total_ppk; ?>],
              backgroundColor: [
                '#7460ee',
                '#28b779'
              ],
              hoverBackgroundColor: [
                '#7460ee',
                '#28b779'
              ],
              borderWidth: [
                0, 0, 0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'User',
            'PPk'
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 55,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: true
          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16
          }
        }
      });
    }

    // Total Form
    var ctx = document.getElementById("percent-chart2");
    if (ctx) {
      ctx.height = 280;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: "My First dataset",
              data: [<?= $total_form_8; ?>, <?= $total_form_11; ?>, <?= $total_form_14; ?>,<?= $total_form_17; ?>, <?= $total_form_22; ?>],
              backgroundColor: [
                '#cd3636',
                '#eb7f19',
                '#2b8f3f',
                '#2c50a2',
                '#9254ac'
              ],
              hoverBackgroundColor: [
                '#cd3636',
                '#eb7f19',
                '#2b8f3f',
                '#2c50a2',
                '#9254ac'
              ],
              borderWidth: [
                0, 0, 0,0,0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent',
                'transparent',
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'Form 8',
            'Form 11',
            'Form 14',
            'Form 17',
            'Form 22'
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 55,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: true
          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16
          }
        }
      });
    }
</script>