<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-4">
        <h4>Data Belanjaan</h4>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Subharga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>

        <h3>Alamat</h3>
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <select class="form-select mt-2" name="nama_provinsi" aria-label="Default select example">
                            <!-- <option selected>-- Pilih Provinsi--</option> -->
                            <!-- <option value="3">Jakarta</option> -->
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Distrik</label>
                        <select class="form-select mt-2" name="nama_distrik" aria-label="Default select example">
                            <!-- <option selected>-- Pilih Distrik--</option>
                            <option value="3">Jakarta</option> -->
                        </select>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'post',
                url: 'data_provinsi.php',
                success: function(hasil_provinsi) {
                    $("select[name=nama_provinsi]").html(hasil_provinsi);
                }
            });
            $("select[name=nama_provinsi]").on("change", function() {
                // Ambil id_provinsi yang dipilih dari atribut atau inputan provinsi
                var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
                $.ajax({
                    type: 'post',
                    url: 'data_distrik.php',
                    data: 'id_provinsi=' + id_provinsi_terpilih,
                    success: function(hasil_distrik) {
                        $("select[name=nama_distrik]").html(hasil_distrik);
                    }
                })
            })
        });
    </script>

</body>

</html>