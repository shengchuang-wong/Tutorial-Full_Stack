Rectangle Attributes
====================
1. x <<< x-coordinate of upper-left corner
2. y <<< y-coordinate of upper-left corner
3. width <<< width of rectangle
4. height <<< height of rectangle
5. stroke <<< border color
6. stroke-width <<< border thickness
7. fill <<< interior color
8. rx <<< round corner in x direction
9. ry <<< round corner in y direction


Polygon Attributes
==================
1. points <<< space-seprated list of points representing vertices of the polygon
- points are of the form "x1,y1 x2,y2 ...,..."


Circle Attributes
=================
1. cx <<< x-coordinate of center
2. cy <<< y-coordinate of center
3. r <<< radius of circle


Text Attribute
==============
1. x <<< coordinate of lower-left corner
2. y <<< coordinate of lower-left corner
3. dx
4. dy
5. text-anchor (start, middle, end)
6. alignment-baseline (hanging, middle, baseline)
7. transform


Path Attributes
===============
1. M <<< move (M, X, Y) move cursor to X, Y location
2. L <<< line (Uppercase XY for L and lowercase XY for L act differently, UPPERCASE represetn the location you want to go to, lowercase represent how far  you want to go from your current position)
3. Z <<< close path
4. H <<< draw a horizontal line
5. V <<< draw a vertical line
6. Q <<< quadratic Bezier curve
7. C <<< cubic Bezier curve
8. A <<< circular arc