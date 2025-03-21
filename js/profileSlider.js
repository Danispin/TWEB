const profileImages = {
    profile1: ["./css/avatars/profile1/avatar1.png", "./css/avatars/profile1/avatar2.png", "./css/avatars/profile1/avatar3.png"],
    profile2: ["./css/avatars/profile2/avatar1.png", "./css/avatars/profile2/avatar2.png", "./css/avatars/profile2/avatar3.png"],
    profile3: ["./css/avatars/profile3/avatar1.png", "./css/avatars/profile3/avatar2.png", "./css/avatars/profile3/avatar3.png"],
    profile4: ["./css/avatars/profile4/avatar1.png", "./css/avatars/profile4/avatar2.png", "./css/avatars/profile4/avatar3.png"]
};

let currentProfile = null;
let currentInterval = null;

function showProfile(event, profileId) {

    if (currentProfile && currentProfile !== profileId) {
        hideProfile(currentProfile);
    }

    let profileBox = document.getElementById(`profile-box${profileId.slice(-1)}`);
    if (!profileBox) return;

    profileBox.style.display = "block";
    profileBox.style.left = event.pageX + "px";
    profileBox.style.top = event.pageY + "px";

    currentProfile = profileId;

    let imgElement = document.getElementById(`profile-img${profileId.slice(-1)}`);
    if (imgElement && profileImages[profileId]) {
        let images = profileImages[profileId];
        let index = 0;
        imgElement.src = images[index];

        clearInterval(currentInterval);

        currentInterval = setInterval(() => {
            index = (index + 1) % images.length;
            imgElement.src = images[index];
        }, 2000);
    }


    profileBox.onmouseleave = () => hideProfile(profileId);
}

function hideProfile(profileId) {
    let profileBox = document.getElementById(`profile-box${profileId.slice(-1)}`);
    if (profileBox) {
        profileBox.style.display = "none";
        clearInterval(currentInterval);
    }

    if (currentProfile === profileId) {
        currentProfile = null;
    }
}
