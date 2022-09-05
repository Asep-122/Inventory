
<style>
	table,th, td {
 		 padding: 10px;
	}
</style>

<!-- <div class="container"> -->
	<div class="row">
		<div class="col-md-5">
			<table>
				<tr>
					<td>
						<label>Pilih Jenis</label>					
					</td>
					<td>
						<select class="form-control" name="transaksiStock">
							<option name="all">All</option>
							<option name="masuk">Masuk</option>
							<option name="keluar">Keluar</option>
						</select>						
					</td>
					<td>
						<button class="btn btn-primary btn-sm" name="submit" id="searchRange">Submit</button>
						
					</td>
				</tr>
			</table>
		</div><br>

		
</div>
	<div id="range">


	</div>	

<div class="data-table-list">
   <div class="basic-tb-hd" id="TableTransaction">
<!-- 	<table class="table table-responsive table-striped table-hover table-info table-bordered" id="data-table-basic">
	<thead class="table thead-dark">
		<tr>
			<th>KodeItem</th>
			<th>Nama Item</th>
			<th>Jenis transaksi</th>
			<th>Stock Transaksi</th>
			<th>LastDateStock</th>
			<th>User Entry</th>
			<!-- <th>Action</th> -->
<!-- 		</tr>
	</thead>
	<tbody>
 -->		<!-- <?php foreach ($queryA as $key): ?>					 -->
		<!-- <tr> -->
			<!-- <td><?php echo $key['KodeItem'] ?></td> -->
			<!-- <td><?php echo $key['NamaItem'] ?></td> -->
<!-- 			<td>In Stock Item</td>
			<td><?php echo $key['StockItem'] ?></td>
			<td>Date Transaksi</td>
			<td><?php echo $key['UserEntry'] ?></td>
 --><!-- 			<td>

				<a href="#" data-backdrop="static" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i></a> |  
				<a href="#" data-backdrop="static" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-minus"></i></a> 
			</td>
 <!-- 		</tr> -->
		<!-- <?php endforeach ?> -->
<!-- 	</tbody>
</table>
 --></div>
</div>


<script type="text/javascript">
	       $('#searchRange').click(function(event) {
            if ($('select[name="transaksiStock"]').val()=='All') {
                   $('#range').text('');
                   $.ajax({
                       url: '<?php echo base_url('C_Main/GetHistoryTransaksi') ?>',
                       type: 'POST',
                       dataType: 'json',
                       // data: {param1: 'value1'},
                       success:function (argument) {

                            console.log(argument);
                            var baris = '';
                            baris += '<table class="table table-striped table-hover table-info table-bordered" id="data-table-basic">'+
                                         '<thead class="table thead-dark">'+
                                            '<tr>'+
                                                '<th>JenisTransaksi</th>'+
                                                '<th>Document</th>'+
                                                '<th>KodeBarang</th>'+
                                                '<th>Qty</th>'+
                                                '<th>TglTransaksi</th>'+
                                                '<th>UserEntry</th>'+
                                            '<tr>'+
                                        '</thead>'+
                                        '<tbody>';
                           for (var i = 0;i<argument.length ; i++) {
                               baris += 
                                            '<tr>'+
                                                '<td>'+argument[i].JenisTransaksi+'</td>'+
                                                '<td>'+argument[i].Document+'</td>'+
                                                '<td>'+argument[i].KodeBarang+'</td>'+
                                                '<td>'+argument[i].Qty+'</td>'+
                                                '<td>'+argument[i].TglTransaksi+'</td>'+
                                                '<td>'+argument[i].UserEntry+'</td>'+
                                            '<tr>'
                           }
                           baris += '<tbody>'+
                                        '<table>';

                           $('#TableTransaction').html(baris);
                       }
                   })
                   
            }
   
            else{
                 $('#TableTransaction').text('');
                   $('#range').html('<table>'+
                   						'<tr>'+
	                   						'<td><label>Tanggal</label></td>'+
	                                             // '<td><input type="date" value="2020-02-12" name="date1" id="date1" class="form-control"></td>'+
	                                             // '<td><input type="date" name="date2" value="2020-02-13" class="form-control"></td>'+
	                                             '<td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div><input type="date" class="form-control float-right" id="date1" name="date1"></div></td>'+
	                                             '<td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div><input type="date" class="form-control float-right" id="date2" name="date2"></div></td>'+
	                                          '<td><button class="btn btn-info btn-sm" id="SubmitRangeDate">Submit</button></td>'+
                                          '</tr>'+
                                       '</table>'
                                 );

                   $('#SubmitRangeDate').click(function(event) {

                        var select = $('select[name="transaksiStock"]').val();   
                        var date1 = $('input[name="date1"]').val();   
                        var date2 =  $('input[name="date2"]').val();   

                        $.ajax({
                            url: '<?php echo base_url('C_Main/GetHistoryTransaksi2') ?>',
                            type: 'POST',
                            dataType: 'json',
                            data: {select: select,date1 : date1,date2 : date2},
                            success:function (argument) {
                                console.log(argument.length);
                            var baris = '';
                            baris += '<table class="table table-striped table-hover table-info table-bordered" id="data-table-basic">'+
                                         '<thead class="table thead-dark">'+
                                            '<tr>'+
                                                '<th>JenisTransaksi</th>'+
                                                '<th>Document</th>'+
                                                '<th>KodeBarang</th>'+
                                                '<th>Qty</th>'+
                                                '<th>TglTransaksi</th>'+
                                                '<th>UserEntry</th>'+
                                            '<tr>'+
                                        '</thead>'+
                                        '<tbody>';
                           if(argument.length > 0 ){            
                               for (var i = 0;i<argument.length ; i++) {
                                   baris += 
                                                '<tr>'+
                                                '<td>'+argument[i].JenisTransaksi+'</td>'+
                                                '<td>'+argument[i].Document+'</td>'+
                                                '<td>'+argument[i].KodeBarang+'</td>'+
                                                '<td>'+argument[i].Qty+'</td>'+
                                                '<td>'+argument[i].TglTransaksi+'</td>'+
                                                '<td>'+argument[i].UserEntry+'</td>'+
                                                '<tr>'
                               }
                            }
                            else{
                                baris += '<tr><td colspan="6" align="center">'+"Data Not Available"+'</td></tr>';
                            }
                           baris += '<tbody>'+
                                        '<table>';

                           $('#TableTransaction').html(baris);

                            }
                        })



                   });
            }
        });

</script>