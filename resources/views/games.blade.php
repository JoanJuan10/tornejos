@extends("layouts.layout")

@section("css")
<style>
    html, body {
        height:100%; margin:0; 
    }
    #mainNav, .footer {
        background-color: black!important;
        color: white;
    }
    .footer {
        align: bottom;
        margin-top:auto;
    }
    body {
        background-image: url("img/background.png");
        display: flex;
        flex-direction:column;
    }
    tr, td, th {
        text-align: center;
        color: white;
        border: 1px;
        
    }
    input {
        color: white;
        background-color: transparent;
        text-align: center;
        margin: 0 auto;
        width: 40%;
    }
    
</style>
@endsection

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

@section("content")
<div class="container">
    <section style="text-align: center">
        <h2 style="color: white">Busca Tornejos</h2><br><br>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    </section>

    <section>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th scope="col">Jocs</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CSGO</td>
                </tr>
            </tbody>
        </table>
    </section>
</div>

@endsection
