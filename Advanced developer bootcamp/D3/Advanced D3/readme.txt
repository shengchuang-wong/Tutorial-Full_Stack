Transition
----------
1. transition.attr(name, newVal)
2. transition.attr(name, newVal)
3. transition.transition()
4. transition.merge(other)
5. transition.selection()
6. transition.duration([value])
7. transition.ease([value])
E.g. .ease(d3.easeLinear)
8. transition.delay([value])
E.g. .delay((d, i) => i * 250)
9. transition.on(typenames, [listener])
- Types of transition events: start, end, interrupt
.on('start', function(d, i) {
	if(i ==== 0) {
		d3.select('.title')
			.text('Updating to ' + year);
	}
})
.on('end', function(d, i, nodes) {
	if(i === nodes.length - 1) {
		d3.select('.title') {
			.text('Birth Data in ' + year);
		}	
	}
})
.on('interrupt', function() {
	console.log('Inteerupted! No longer updating to ' + year);
})

10. d3.json(url, [callback])
11. d3.csv(url, [callback])
	d3.csv(url, formatter, [callback])
12. d3.queue() <<< handling async request
	queue.defer(fn, [arguments])
13. queue.await() 
    queue.awaitAll()
14. d3.geoPath() <<< GeoJSON + D3
15. path.projection <<< TopoJSON Projections

Force-Directed Graph
====================
1. d3.forceSimulation([nodes])
2. simulation.nodes([newNodes])
3. d3.forceCenter([x,y])
4. simulation.force(name, [force])
5. simulation.on(type, [listener]) - tick, end
6. d3.forceManyBody()
7. force.strength([newStrength])
8. d3.forceLink([links])
9. link.id([id])
10. link.strength([newStrength])
11. d3.drag() - fx, fy
12. simulation.alpha([newAlpha])
13. simulation.alphaMin([newMin])
14. simulation.alphaDecay([newDecay])
15. simulation.alphaTarget([newTarget])
