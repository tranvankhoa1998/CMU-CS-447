<?php
	session_start(); 
 ?>
<?php require_once("includes/connection.php");?>
<?php include("includes/permission.php");?>
<?php include ("includes/header.php"); ?>
	<form action="chinh-sua-thanh-vien.php" method="post">
		<table>
			<tr>
				<td colspan="2">
					<h3>Chỉnh sửa thông tin thành viên</h3>
					<input type="hidden" name="id" value="">
				</td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Họ tên :</td>
				<td><input name="fullname" id="fullname" ></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Địa chỉ email :</td>
				<td><input type="text" id="email" name="email" value=""></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Quyền :</td>
				<td>
					<select id="permission" name="permission">
						<option value="-1"></option>
						<option value="0" >Thành viên thường</option>
						<option value="1" >Admin cấp 1</option>
						<option value="2" >Admin cấp 2</option>
					</select>
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap">Block người dùng :</td>
				<td><input type="checkbox" id="is_block" name="is_block" value="1"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Cập nhật thông tin"></td>
			</tr>

		</table>
	</form>
<?php include "includes/footer.php" ?>