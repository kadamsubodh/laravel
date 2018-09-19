@extends('layout.app')
@section ('title', 'home')
@section ('head','List')
@section('body')
<!-- <form name="frm" action="deleteMultiCategory.php" method="POST" id="frm"> -->
<div class="container-fluid">
	<div class="container Manage">
		<div class="row right1">
		<div class="manageBtn">
			<ul>
				<!-- <li>
					<a href="main.php">Create Category</a>
				</li>
				<li>
					<a href="deleteMultiCategory.php" onclick="document.getElementById('frm').submit(); return true;">Delete</a>
				</li> -->
				<li>
					<a href="/category/create">Create Category</a>
				</li>
				<li>
					<input type="submit" value="Delete" class="delBtn"/>
				</li>

			</ul>
			</div>
		</div>
<div class="tableDiv" id="tableDiv">
<table class="table table-bordered table-hover ">
					<tr>
						<th width='10%'><input type="checkbox" id="selectall"/></th>
						<th width='60%'>NAME</th>
						<th>Action</th>
					</tr>
					@foreach($categories as $cat)
						<tr>
						<td><input type="checkbox" value='{{$cat->id}}' class="checkboxall" name="check_list[]"/></td>
						<td>{{$cat->cat_name}}</td>
						<td>
							<div class="row" style="margin-left:0px" id="">
								<!-- <a href="{{'/category/'.$cat->id}}" );"> -->
								<div class="btn">
								<form action="{{'/category/'.$cat->id }}" method="post">	
									{{csrf_field()}}
									{{method_field('delete')}}
								<input type="submit" class="delicon" onclick="return confirm('Are you sure want to delete this?');" value=""/>
								</form>
							</div>
						
							<div class="btn">
								<form action="{{'/category/'.$cat->id.'/edit'}}" method="post">
									{{csrf_field()}}
									{{method_field('GET')}}
								<input type="submit" class="editicon" onclick="return confirm('Are you sure want to edit this?');" value=""/>
								</form>
							</div>
							
						</div>
							
					</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
<!-- </form> -->
@endsection
