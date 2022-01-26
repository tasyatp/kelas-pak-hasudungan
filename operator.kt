fun main()
{
   /* jenis operator :
            1, arimathic operators (+, -, *, /, %, ++, --)
    2.assigment operators (+=, -=, /=, *=, %=, =)
    3. comparison operators (==,!=,>,<,>=,<=)
    4.logical operators (&&, || , !)*/

    var a = 5
    var b = 10

    var c =  a + b
    var d = a - b
    var e = a * b
    var f = a / b
    var g = a % b
    var h = a++


// assigment
    a += 5
    println(a)
    b -= 6
    println(b)

// comparison
    var k = a == b
    println (k)

    println (a > 3)
    println (b < 11)
    println (b > 20)
    println ( a ==5)
    println ((a > 3) && (a < 6))
    println ((a > 3) || (a < 6))
    println (!(a > 3))


    println ("Hasil " +c)
    println ("Hasil " +d)
    println ("Hasil " +e)
    println ("Hasil " +e)
    println ("Hasil " +f)

}