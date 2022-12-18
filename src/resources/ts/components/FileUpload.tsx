import "../../scss/fileupload.css";
import { useDropzone } from "react-dropzone";
import { useCallback, useState } from "react";
import React from "react";
import AWS, { AWSError } from 'aws-sdk'

const s3 = new AWS.S3({
  accessKeyId:"",
  secretAccessKey: ""
})

const uploadS3 = (image: string) => {
  const fileData = image.replace(/^data:\w+\/\w+;base64,/, '')
  const decodedFile = new Buffer(fileData, 'base64')
  const fileExtension = "jpg"
  const contentType = image
    .toString()
    .slice(image.indexOf(':') + 1, image.indexOf(';'))

  const params = {
    Bucket: "system01-s3",
    Key: [`KeyName`, fileExtension].join('.'),
    Body: decodedFile,
    ContentType: contentType,
    ACL: 'public-read-write'
  }
  s3.putObject(params, (err: AWSError) => {
    if (err) {
      throw err
    }
  })
}

export default function FileUpload() {
  const [isUpload, setIsUpload] = useState(false);
  const [imgSrc, setImgSrc] = useState("");

  const resizeUpload = (base64: string) => {
    const imgType = base64.substring(5, base64.indexOf(';'))
    const img = new Image()
    img.onload = () => {
      const canvas = document.createElement('canvas')
      const width = img.width * 0.5
      const height = img.height * 0.5
      canvas.width = width
      canvas.height = height
      const ctx = canvas.getContext('2d')!
      ctx.drawImage(img, 0, 0, width, height)
      const reSizeData = canvas.toDataURL(imgType)
      setImgSrc(reSizeData);
      uploadS3(reSizeData);
    }
    img.src = base64
  }

  const encodeToBase64 = async (file: File) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
      const base64 = reader.result as string;
      resizeUpload(base64)
    };
  };

  const onDrop = useCallback((acceptedFiles) => {
    const file = acceptedFiles[0];
    setIsUpload(true);
    encodeToBase64(file);
  }, []);


  const { getRootProps, getInputProps } = useDropzone({ onDrop });

  return (
    <div>
      <div className="drop-area" {...getRootProps()}>
        {isUpload ? <img className="image" alt="投稿画像" src={imgSrc} /> : <h1>画像をドラッグ</h1>}
      </div>
      <button {...getRootProps()}>
        画像を選択
        <input {...getInputProps()} />
      </button>
    </div>
  );
}
