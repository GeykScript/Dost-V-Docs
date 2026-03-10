const getBrandColor = () => {
  const computedStyle = getComputedStyle(document.documentElement);
  return computedStyle.getPropertyValue('--color-fg-brand').trim() || "#00AEEF";
};

const brandColor = getBrandColor();

const options = {
  chart: {
    height: "90%",
    type: "area",
    toolbar: { show: false },
  },

  dataLabels: {
    enabled: false
  },

  stroke: {
    curve: 'smooth',
    width: 4,
  },

  series: [
    {
      name: "Documents",
      data: [20, 45, 12, 5, 27, 33, 40],
      color: brandColor,
    },
  ],

  tooltip: {
    enabled: true,
    custom: function({ series, seriesIndex, dataPointIndex }) {
      return `
        <div style="padding:6px 10px; font-size:12px;">
          ${series[seriesIndex][dataPointIndex]}
        </div>
      `;
    }
  },

  xaxis: {
    type: 'category',
    categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
    labels: {
      style: { colors: '#6B7280' }
    },
    axisBorder: { show: false },
    axisTicks: { show: false },
  },

  yaxis: {
    labels: {
      style: { colors: '#6B7280' },
      formatter: (value) => value
    },
  },

  grid: {
    borderColor: '#F3F4F6',
    strokeDashArray: 4,
  }
};

if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
  const chart = new ApexCharts(document.getElementById("area-chart"), options);
  chart.render();
}