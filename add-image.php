<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link rel="stylesheet" href="add-image.css">
</head>
<body>
    <h1>Upload Image</h1>
    <div id="drop-area">
        <p>Drag and drop an image file here or click to select one.</p>
        <input type="file" id="fileElem" accept="image/*" onchange="handleFiles(this.files)" style="display:none;">
        <label for="fileElem" id="fileLabel">Select File</label>
    </div>
    <div id="preview"></div>

    <script>
        const dropArea = document.getElementById('drop-area');

        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        // Highlight drop area when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        // Remove highlight when item is no longer hovering
        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        // Handle dropped files
        dropArea.addEventListener('drop', handleDrop, false);

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight() {
            dropArea.classList.add('highlight');
        }

        function unhighlight() {
            dropArea.classList.remove('highlight');
        }

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        function handleFiles(files) {
            const file = files[0];
            if (file) {
                const formData = new FormData();
                formData.append('file', file);

                // Send the file to the server
                fetch('upload_image.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('preview').innerHTML = `<img src="${data.filePath}" alt="Uploaded Image" width="200">`;
                    } else {
                        alert('Upload failed: ' + data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }
    </script>
</body>
</html>