<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?= $title; ?></title>
</head>

<body>

    <!-- Forms order paketan -->
    <section style="height:100vh;background-color:#8395a7" class="d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card border-light mb-3">
                        <div class="card-header">
                            <h4>Order Paket Usaha GrosirBajuKu</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <!-- Jumlah, Daster Karakter, Nama Lengkap, Alamat Lengkap, Hp -->
                                <div class="row">
                                    <div class="col-lg-8">
                                        <label for="namaPaket">Nama paket :</label>
                                        <select name="namaPaket" id="namaPaket" class="form-control">
                                            <?php foreach ($result_paket as $rp) : ?>
                                                <option harga="<?= $rp['total'] ?>" value="<?= $rp['id_paket'] ?>"><?= $rp['namaPaket'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="qty">Qty :</label>
                                        <input type="number" class="form-control" id="qty" placeholder="Mau berapa ?">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="namaLengkap">Nama lengkap :</label>
                                    <input type="text" class="form-control" id="namaLengkap" placeholder="Nama lengkap..">
                                </div>
                                <div class="form-group">
                                    <label for="phone">No HP :</label>
                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="082-xxx-xxx">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat :</label>
                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="catatan">catatan :</label>
                                    <textarea class="form-control" name="catatan" id="catatan" cols="30" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-light mb-3">
                        <div class="card-header">Informasi Kami :</div>
                        <div class="card-body">
                            <h5 class="card-title">Light card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $.ajax({
            url: 'test/add',
            type: 'post',
            data: data,
            success: function(data) {
                $('body').load('test');
            }
        });


        $(document).ready(function() {

            orderPaket();
        })
    </script>
</body>

</html>