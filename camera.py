import cv2
import os
import subprocess
import datetime
import time

# Get the current directory where the script is located
current_dir = os.path.dirname(os.path.abspath(__file__))

def get_timestamp():
    return datetime.datetime.now().strftime("%Y%m%d_%H%M%S")

def send_to_c(image1, image2):
    subprocess.run([os.path.join(current_dir, "./detectMotion"), image1, image2])

def record_video():
    timestamp = get_timestamp()
    video_file = os.path.join(current_dir, f"video_{timestamp}.h264")
    os.system(f"raspivid -o {video_file} -t 5000")

def main():
    camera = cv2.VideoCapture(0)
    count = 0
    previous_image = None

    while count < 7:
        start_time = time.time()  # Record the start time

        # Discard buffered frames
        for _ in range(5):
            camera.grab()

        ret, frame = camera.read()
        if not ret:
            print("Failed to capture image")
            break

        timestamp = get_timestamp()
        image_path = os.path.join(current_dir, f"image_{timestamp}.jpg")
        cv2.imwrite(image_path, frame)

        #if previous_image:
         #   send_to_c(previous_image, image_path)

        previous_image = image_path
        count += 1

        print(f"Captured {count} images")

        elapsed_time = time.time() - start_time  # Calculate the elapsed time
        sleep_time = max(0, 1 - elapsed_time)  # Adjust the sleep time to ensure 1-second intervals
        time.sleep(sleep_time)

        if cv2.waitKey(1) & 0xFF == ord('q'):
            break

    camera.release()

    if count == 7:
        print("Recording 5-second video...")
        record_video()

if __name__ == "__main__":
    main()


