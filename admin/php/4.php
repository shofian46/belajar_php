<?php

function callName()
{
  echo "Fikri: <br>";
}

function callNameLagi()
{
  return "This is anomali <br>";
}

function perkalian($angka1, $angka2)
{
  // $angka1 = 20;
  // $angka2 = 30;
  $total = $angka1 * $angka2;
  return $total;
}

callName();
echo callNameLagi();
echo perkalian(40, 20);
