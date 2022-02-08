fun main()
{
    val day = 6

    val hari = when (day)
    {
        in 1 -> "libur"
        2 -> "Senin"
        3 -> "Selasa"
        4 -> "Rabu"
        5 -> "Kamis"
        6 -> "Jumat"
        7 -> "Sabtu"
        else -> "hari tidak ada"
    }

    println(hari)
}