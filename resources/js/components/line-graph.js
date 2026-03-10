const getBrandColor = () => {
  const computedStyle = getComputedStyle(document.documentElement);
  // Defaulting to your brand blue if the variable isn't found
  return computedStyle.getPropertyValue('--color-fg-brand').trim() || "#00AEEF";
};

const brandColor = getBrandColor();

const options = {
  chart: {
    height: "90%",
    type: "area",
    fontFamily: "Inter, sans-serif",
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
      name: "New users",
      data: [6500, 6418, 6456, 6526, 6356, 6456, 6700],
      color: brandColor,
    },
  ],
  xaxis: {
    // 1. Change type to 'category'
    type: 'category',
    // 2. Move your dates here
    categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
    labels: {
      show: true,
      style: { colors: '#6B7280' }
    },
    axisBorder: { show: false },
    axisTicks: { show: false },
  },
  yaxis: {
    // 3. Remove categories from here; let it handle the numbers (6500, etc.)
    labels: {
      show: true, 
      style: { colors: '#6B7280' },
      // Optional: formats 6500 to "6.5k"
      formatter: (value) => { return value >= 1000 ? (value / 1000).toFixed(1) + 'k' : value },
    },
  },
  grid: {
    show: true,
    borderColor: '#F3F4F6',
    strokeDashArray: 4,
  },
}

if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
  const chart = new ApexCharts(document.getElementById("area-chart"), options);
  chart.render();
}

