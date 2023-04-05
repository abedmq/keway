<table class="table table-striped">
    <tbody>
    <tr>
        <th width="25%">الاسم</th>
        <td>{{$message->user->name}}</td>
    </tr>
    <tr>
        <th width="25%">المشرف</th>
        <td>{{$message->admin->name??''}}</td>
    </tr>
    <tr>
        <th>البريد الإلكتروني</th>
        <td>{{$message->email}}</td>
    </tr>
    <tr>
        <th>الرسالة</th>
        <td>{{$message->message}}</td>
    </tr>
    </tbody>
</table>
