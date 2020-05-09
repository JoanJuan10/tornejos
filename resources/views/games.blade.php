@extends("layouts.layout")

@section("js")
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("table");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } 
                else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
</script>

@endsection

@section("css")
<style>
    .boton-juego {
        width: 100%;
        color: white;
        margin-top: 5px;
        margin-bottom: 20px;
    }
    .img-fluid {
        width: 100%;
    }

</style>
@endsection

@section("content")

<section>
    <div class="container">
    <div class="row">
        <h2 style="color: white">Busca Tornejos</h2><br><br>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    </div>
        <div class="row">
            @foreach ($games as $game)
                <div class="col-md-3">
                    <div><img id="icono" class="img-fluid" src="{{$game->img_link}}"></div>
                    
                    <form action="{{route("listTournaments", $game->id)}}" method="get">
                        <button type="submit" class="btn btn-outline-dark boton-juego">{{$game->name}}</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
