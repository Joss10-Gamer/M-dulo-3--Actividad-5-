<?php
function bubbleSortDesc(&$arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] < $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
}

function mergeSort($arr) {
    if (count($arr) <= 1) {
        return $arr;
    }
    $middle = intval(count($arr) / 2);
    $left = array_slice($arr, 0, $middle);
    $right = array_slice($arr, $middle);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];
    $i = $j = 0;
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) {
            $result[] = $left[$i];
            $i++;
        } else {
            $result[] = $right[$j];
            $j++;
        }
    }
    while ($i < count($left)) {
        $result[] = $left[$i];
        $i++;
    }
    while ($j < count($right)) {
        $result[] = $right[$j];
        $j++;
    }
    return $result;
}

function insertionSort(&$arr) {
    $n = count($arr);
    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;
        while ($j >= 0 && strtolower($arr[$j]) > strtolower($key)) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $key;
    }
}

// ------------------ MENÚ ------------------
do {
    echo "\n==============================\n";
    echo "   MENÚ - ALGORITMOS ORDENAMIENTO\n";
    echo "==============================\n";
    echo "1. Bubble Sort (números descendente)\n";
    echo "2. Merge Sort (palabras alfabéticas)\n";
    echo "3. Insertion Sort (nombres alfabéticos)\n";
    echo "4. Salir\n";
    echo "Elige una opción: ";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:
            echo "Ingresa los números separados por comas: ";
            $input = trim(fgets(STDIN));
            $arr = array_map('intval', explode(',', $input));

            echo "Lista original: ";
            print_r($arr);

            bubbleSortDesc($arr);

            echo "Lista ordenada (descendente): ";
            print_r($arr);
            break;

        case 2:
            echo "Ingresa palabras separadas por comas: ";
            $input = trim(fgets(STDIN));
            $arr = array_map('trim', explode(',', $input));

            echo "Lista original: ";
            print_r($arr);

            $sorted = mergeSort($arr);

            echo "Lista ordenada (alfabética): ";
            print_r($sorted);
            break;

        case 3:
            echo "Ingresa nombres separados por comas: ";
            $input = trim(fgets(STDIN));
            $arr = array_map('trim', explode(',', $input));

            echo "Lista original: ";
            print_r($arr);

            insertionSort($arr);

            echo "Lista ordenada (alfabética): ";
            print_r($arr);
            break;

        case 4:
            echo "Saliendo del programa...\n";
            break;

        default:
            echo "Opción no válida. Intenta de nuevo.\n";
    }
} while ($opcion != 4);

?>
