<tr>
    <td></td>
    <td>{{$title}}</td>
    <td>
        @if ($codeblocks->where('section',$id)->count() == 0)
            None available
        @else  
            <select name="section_{{$id}}" class="form-control">
                <option value="" disabled selected>None selected</option>
                @foreach($codeblocks->where('section',$id) as $codeblock)
                    <option value="{{$codeblock->id}}" {{$codeblock->template == true ? "selected" : ""}}>{{$codeblock->title}}</option>
                @endforeach
            </select>
        @endif
    </td>
</tr>