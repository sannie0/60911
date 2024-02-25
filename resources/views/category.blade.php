<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-11</title>
</head>
<body>
<h2>{{$category ? "Список товаров категории: ".$category->name : 'Неверный ID категории'}}</h2>
@if($category)
<table border="1">
    <thead>
    <td>id</td>
    <td>Наименование</td>
    <td>Вес</td>
    <td>Цена</td>
    </thead>
    @foreach($category->items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->weight}}</td>
            <td>{{$item->price}}</td>
        </tr>
    @endforeach
</table>
@endif
</body>
</html>
