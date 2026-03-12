// resources/js/components/line-graph.js

document.addEventListener('DOMContentLoaded', () => {
  const getBrandColor = () => {
    const computedStyle = getComputedStyle(document.documentElement);
    return computedStyle.getPropertyValue('--color-fg-brand').trim() || "#00AEEF";
  };
  
  const brandColor = getBrandColor();

  const options = {
    chart: {
      height: '90%', // fixed height ensures chart shows
      type: "area",
      fontFamily: "Inter, sans-serif",
      toolbar: { show: false },
      zoom: { enabled: false },
      selection: { enabled: false },
      animations: { enabled: false }
    },
    fill: {
      type: "gradient",
      gradient: {
        opacityFrom: 0.55,
        opacityTo: 0,
        shade: brandColor,
        gradientToColors: [brandColor],
      },
    },
    tooltip: { enabled: false },
    states: {
      hover: { filter: { type: "none" } },
      active: { filter: { type: "none" } }
    },
    markers: { size: 0 },
    dataLabels: { enabled: false },
    stroke: { curve: 'smooth', width: 4 },
    series: [
      { name: "Documents", data: [34, 42, 38, 51, 47, 29, 36], color: brandColor }
    ],
    xaxis: {
      type: 'category',
      categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      labels: { show: true, style: { colors: '#6B7280' } },
      axisBorder: { show: false },
      axisTicks: { show: false },
    },
    yaxis: { labels: { show: true, style: { colors: '#6B7280' } } },
    grid: { show: true, borderColor: '#F3F4F6', strokeDashArray: 4 },
  };

  const chartEl = document.getElementById("area-chart");
  if (chartEl && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(chartEl, options);
    chart.render();
  }
});