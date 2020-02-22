1. d3.max(dataArr, [callback])
   d3.min(dataArr, [callback])

d3.max([1,2,4,5,8,5]);

var people = {
	{ name: 'Brett', age: 40 },
	{ name: 'Brett', age: 67 },
	{ name: 'Brett', age: 46 },
	{ name: 'Brett', age: 42 }
};

d3.max(people, d => d.age);
d3.min(people, d => d.age);


2. var scale = d3.scaleLinear()
				.domain([1,17])
				.range([-4,52]);


3. Axes
d3.axisTop(scale)
d3.axisRight(scale)
d3.axisBottom(scale)
d3.axisLeft(scale)

var xAxis = d3.axisBottom(xScale)
				.tickSize(-height + 2 * padding)
				.tickSizeOuter(0);
var yAxis = d3.axisLeft(yScale)
				.tickSize(-width + 2 * padding);

d3.select('svg')
	.append('g')
		.attr('transform', `translate(${padding},0)`)
		.call(xAxis);

d3.select('svg')
	.append('g')
		.attr('transform', `translate(${padding},0)`)
		.call(yAxis);

.tick line {
	stroke: #ccc;
	stroke-dasharray: 10, 5;
}


4. Gridlines
axis.tickSize([size]) <<< example shown at 3.Axes

5. Histogram
d3.histogram()
histogram.value([value])
histogram.thresholds([value])
scale.ticks([count])

var histogram = d3.histogram()
					.value(d => d.births);

var bins = histogram(yearData)


6. Pie Charts
d3.pie()
dr.arc()

var arcs = d3.pie()
			.value(d => d.births)
			(yearData);

Arc Helpers
-----------
arc.innerRadius([val]) - set the inner radius
arc.outerRadius([val]) - set the outer radius
arc.startAngle([val]) - set the start angle
arc.endAngle([val]) - set the end angle

var path = d3.arc()
			.outerRadius(width / 2 - 10)
			.innerRadius(width / 4);

Chart Styling Helpers
---------------------
pie.padAngle - set padding between arcs
arc.padAngle - set padding between arcs
arc.cornerRadius - round arc corners

Sorting Arcs
------------
pie.sort([comparator])