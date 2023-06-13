<form method="POST" action="{{ route('pdf.extracted') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="pdf_file"  required>
    <button type="submit">Extract Text</button>
</form>
