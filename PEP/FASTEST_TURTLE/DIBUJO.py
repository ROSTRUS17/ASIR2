from turtle import *
speed(0)
begin_fill()
pensize(3) 
pencolor("black")
color("black")

setpos((0,30))
begin_fill()
for i in range(36):
    right(10)
    forward(5)
end_fill()

penup()
pensize(10)
setpos((5,75))
pendown()
for i in range(36):
    right(10)
    forward(13)

penup()
pensize(10)
setpos(0, -200)
pendown()

circle(200)

pensize(12)
for i in range(12):
    penup()
    setpos(0,0)
    right(30)
    pendown()
    forward(110)
    right(90)
    forward(20)
    left(90)
    forward(85)


penup()
setpos((-350,0))
pendown()
for i in range(24):
    left(15)
    forward(30)

for i in range(36):
    right(10)
    forward(23)

penup()
setpos((380,0))
pendown()
for i in range(24):
    left(15)
    forward(30)

for i in range(36):
    right(10)
    forward(23)


###############
penup()
pensize(8)
setpos((-357.5,162.5))
pendown()
for i in range(36):
    right(10)
    forward(8)

penup()
setpos((-360,115))
pendown()

pensize(10)
for i in range(12):
    penup()
    setpos(-360, 115)
    right(30)
    pendown()
    forward(70)
    right(90)
    forward(10)
    left(90)
    forward(40)

##HOLAAAA

penup()
pensize(8)
setpos((372.5,162.5))
pendown()
for i in range(36):
    right(10)
    forward(8)

penup()
setpos((370,115))
pendown()

pensize(10)
for i in range(12):
    penup()
    setpos(370, 115)
    right(30)
    pendown()
    forward(70)
    right(90)
    forward(10)
    left(90)
    forward(40)

###############

penup()
pensize(8)
setpos((-357.5,-72.5))
pendown()
for i in range(36):
    right(10)
    forward(10)

penup()
setpos((-360,-130))
pendown()

pensize(10)
for i in range(12):
    penup()
    setpos(-360, -130)
    right(30)
    pendown()
    forward(90)
    right(90)
    forward(10)
    left(90)
    forward(40)

###############

penup()
pensize(8)
setpos((372,-72.5))
pendown()
for i in range(36):
    right(10)
    forward(10)

penup()
setpos((370,-130))
pendown()

pensize(10)
for i in range(12):
    penup()
    setpos(370, -130)
    right(30)
    pendown()
    forward(90)
    right(90)
    forward(10)
    left(90)
    forward(40)

done()