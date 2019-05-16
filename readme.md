# Project 4
+ By: Gary Host
+ Production URL: <http://p4.garyhost.me>

## Feature summary
* This website is a photo organizer and EXIF-data extractor designed to look similar to traditional 35mm contact 
sheets. I tailored it to support my photography, as I am often uncomfortable with the slow and bloated software that 
exists. 

+ Users can register and log-in. I adapted Laravel's system slightly to meet course requirements.
+ Users can upload multiple image files at a time; thumbnails are created for precise pixel count.
+ The most useful EXIF data is extracted from the files and loaded into the database.
+ Contact sheets use the same ratios, including spacing, as traditional 35mm contact sheets.
+ Users can delete sheets/photos and edit detail data for photos.
+ Users are blocked from viewing other users' contact sheets and images.

## Database summary

In addition to the migrations and password tables, my application has 3 tables in total (`users`, `sheets`, and 
`images`).
+ There's a one-to-many relationship between `users` and `sheets`.
+ There's a one-to-many relationship between `sheets` and `images`.

## Outside resources
I used the library [Intervention Image](http://image.intervention.io/) for image resizing, reading, and EXIF 
extraction. I adapted the built-in Laravel login and password system. I used [this 
page](https://www.media.mit.edu/pia/Research/deepview/exif.html) at the MIT media lab to understand the EXIF format. 
I used [this tutorial](https://laraveldaily.com/upload-multiple-files-laravel-5-4/) from Laravel Daily as a starting 
point to upload multiple files. I consulted StackOverflow for an elegant way to do [Delete 
Confirmation](https://stackoverflow.com/questions/32984859/delete-confirmation-in-laravel) in Laravel.

I also used the following free public domain images from flickr in the sample website:
[1](https://www.flickr.com/photos/mathiasappel/26576011703/in/photolist-Gur1ok-FRdYj6-HiMuSF-GCiJjS-2b7gvKb-Mma6Pb-NfEEzJ-2bHrof5-251iJW4-VAEZeD-JvMr6M-HzEdHY-SmxoWJ-2dQn88H-24BJ5Vn-28Uzayc-2bqFMTG-2bqFMM9-js38AF-js5wcm-NK2kt8-a6ZJoL-QbUuAY-29zYAgs-2bdFtcL-27YaXgq-TyggbQ-2cjLj6H-2bdEmAm-Ya1AyT-N5LEoR-LBxZ2-26EgPQ1-8qftQq-a6WRW2-2cffV1s-2bdFctG-26snjDM-29A2RsV-QoVbZ1-2aVVmxP-Rt9feS-2bdwQH9-Zqxzu5-KG6hLu-Mph4Ci-2bQS1Ft-HCy4P1-2fTXuMD-25G7sTU)
[2](https://www.flickr.com/photos/mathiasappel/26154953033/in/photolist-FRdYj6-HiMuSF-GCiJjS-2b7gvKb-Mma6Pb-NfEEzJ-2bHrof5-251iJW4-VAEZeD-JvMr6M-HzEdHY-SmxoWJ-2dQn88H-24BJ5Vn-28Uzayc-2bqFMTG-2bqFMM9-js38AF-js5wcm-NK2kt8-a6ZJoL-QbUuAY-29zYAgs-2bdFtcL-27YaXgq-TyggbQ-2cjLj6H-2bdEmAm-Ya1AyT-N5LEoR-LBxZ2-26EgPQ1-8qftQq-a6WRW2-2cffV1s-2bdFctG-26snjDM-29A2RsV-QoVbZ1-2aVVmxP-Rt9feS-2bdwQH9-Zqxzu5-KG6hLu-Mph4Ci-2bQS1Ft-HCy4P1-2fTXuMD-25G7sTU-a6ZJEJ)
[3](https://www.flickr.com/photos/paintdraw/37938768286/in/photolist-ZNw73A-CTSAP2-SyDaLF-CUdfxp-YPthiQ-2cqQHLA-2aryysM-21ShLrW-251aAMS-S2uAoD-Ti1asc-GrRwzD-vEMj8C-R1kUsZ-2f9znGE-23wnKKW-2edHNXQ-2aW3Ybi-24xLuLj-TAjWzJ-MzVH5-ZNu1zq-S4iDEi-2aW3ZCX-2aW3YLB-2bqL4gP-2aXLrzZ-Hot91z-26PjLee-2cjMaGB-24BJ4YT-2dVKKXF-LvVRmk-T7CSqg-Rqfare-27YaXdu-K8PAMc-DVcNTk-27G6YUy-2aWnwR2-26onGbZ-271jKWv-Jx16eH-XMmqZR-287x6Gq-2evVRJq-2cf8WpU-qV99Mw-BCAZTx-25yGU5W)
[4](https://www.flickr.com/photos/97668319@N03/35951425865/in/photolist-WLUso6-21iFzxG-284fF59-297jZw8-EgbXAU-26R87PR-r5FCkJ-27JDdX5-EHqo2k-f4EDHk-V6M21d-tLmpJb-2dcUJV3-2fgWWMJ-9pKodr-2b7b1ou-2aKczzR-23tbFek-Qxgj9Q-2dx759A-2aKcAfi-nSKoFd-ZD9bY5-213BaF2-2efGB8Y-ZfTUzh-Qxgb3j-Egb3CE-fvfWYV-2dcUGjb-NrXWTB-V7iBCW-ar8nZC-r2SaoV-213Cz8a-fvvbjY-8CRW6p-LZczx2-fvvdLh-2bkzePo-8Uoogb-jigXWX-2b7cC9q-26cboT7-27qUuSu-2qeieY-2bC6TPW-RDEFCL-HPf9R1-23wZc14)
[5](https://www.flickr.com/photos/139162177@N05/46079736654/in/photolist-2dcUGjb-NrXWTB-V7iBCW-ar8nZC-r2SaoV-213Cz8a-fvvbjY-8CRW6p-LZczx2-fvvdLh-2bkzePo-8Uoogb-jigXWX-2b7cC9q-26cboT7-27qUuSu-2qeieY-2bC6TPW-RDEFCL-HPf9R1-23wZc14-zdoEv-MisUE-8Btt6p-S4VZXy-uFnmb-eNmjk-PLd247-2f2NmuW-24UMwxB-6r5KZH-8BsG8H-23f283m-8Bt5Kz-6retYQ-pHoiJD-DoQwgw-LeSXF6-28ENYDS-SrVKT5-bQDgVc-rewcWq-25x5Bif-21e7Nrp-nChL6i-6rar4Z-GRt4Vv-2duxqcw-HqqRZi-4v31U7)
[6](https://www.flickr.com/photos/136196931@N05/29318613345/in/photolist-LEMyix-PKj7GF-8CRW44-HaEfbq-Pyw64E-TAK4RF-28KBTPi-H9w1hB-yaY3Mz-yZVCXn-z5fvMD-Fd2dbH-z3fMpP-yvg8B2-2cwiCgW-crhNFA-ZWU6Kt-Cry6rM-6r9Ra1-SA999S-XMd6ZJ-sg4uS6-JEmm3F-6r9Q4N-2bdWEtz-5PHFNN-Ld1CNq-yMGkYX-FnGL99-6ZmqUZ-2bdWERi-232ebgS-KbgQ7W-eSwLUC-BWJKY6-NgZu2u-VNaDrX-21SNBYd-y4ux53-2bvGAau-GMfLZX-Q37Ptw-6r9QSs-SpHgoG-z7kBfY-rqXe24-28xYu3B-zMYH5a-wLCMQ6-2cV6cx4)
[7](https://www.flickr.com/photos/edsonperotoni/17236111338/in/photolist-sg6zpq-ZYLbia-qyEEeo-Drzj1X-BhL1fr-aaQMwJ-peVMwM-sMKYRA-peGjB1-qNX2zw-TJXchQ-qyEHcY-K45edG-26mEE9C-d5M9fW-qjcjsk-aakET7-N4Ycor-4ZAuD1-zmNqby-qR5QwX-NnGpnK-2dYYswz-2aXHyto-biUZ5v-rpvHAJ-cwaYHN-21dYSVW-aahSsT-fELaTA-YmrG7j-qy7Q98-2a7DMdK-2aTBrqc-2aGcXqL-6thGcj-29EsPFC-2377Cf2-N1WmJg-MS6TzF-SEiYcn-2177DqV-2bHhsFp-2cKUHfA-WHdPjt-oEcHMr-nFvgm3-28K6EjN-HEKjsh-aakF17)
[8](https://www.flickr.com/photos/67415843@N05/39450597645/in/photolist-2377Cf2-N1WmJg-MS6TzF-SEiYcn-2177DqV-2bHhsFp-2cKUHfA-WHdPjt-oEcHMr-nFvgm3-28K6EjN-HEKjsh-aakF17-YZuJHJ-2e5KHkP-2bhG8rK-29eLxpp-2bvgHqP-29StPYP-24EXwTP-RNdoMh-29FsuB7-28sCvDM-21iPrfR-6tdyip-dyeNih-Pc5Qgh-ZYtTeQ-23oyj29-6tdygF-24SbH7e-s2TFSg-nusTJL-hCWSre-cgMKEW-o5uia9-RRMbq8-XL4qDb-94NpNU-P86xCu-oNarnT-YxK7gS-aahSaH-9wUHHY-2ba1keZ-WBiiyc-28u2fR7-Z1ADHs-26XuGsy-6thG3y)
[9](https://www.flickr.com/photos/brathot/43150903730/in/photolist-28K6EjN-HEKjsh-aakF17-YZuJHJ-2e5KHkP-2bhG8rK-29eLxpp-2bvgHqP-29StPYP-24EXwTP-RNdoMh-29FsuB7-28sCvDM-21iPrfR-6tdyip-dyeNih-Pc5Qgh-ZYtTeQ-23oyj29-6tdygF-24SbH7e-s2TFSg-nusTJL-hCWSre-cgMKEW-o5uia9-RRMbq8-XL4qDb-94NpNU-P86xCu-oNarnT-YxK7gS-aahSaH-9wUHHY-2ba1keZ-WBiiyc-28u2fR7-Z1ADHs-26XuGsy-6thG3y-qqb8Wt-Mz4bX4-ZqgyKa-28shHE5-CahDBY-eSS6g1-hyMVZt-cM6Sbb-27VQQ79-94Npzd)
[10](https://www.flickr.com/photos/magdalena_b/5274259350/in/photolist-934Xy3-Rgnkpq-rBwSkM-r1qyFs-yMN46h-eeCMWn-bixg68-268V1cL-eeJvJL-25dunyb-ZcKQzs-88pTGz-ch7UXw-k2B4We-soKFKR-k2DdLo-eeD3y4-q5srxZ-e4FU7V-RtVpiF-RYJegW-bMccUD-Wio62L-WCG5w9-KCX1Y-KCV1a-KCNQy-KCP7u-eZUtSv-EUWmed-29Qw84o-8pnvEd-2aemnfX-ch7W6w-ouTnhm-qJMTVD-22MygZo-8Rf55F-YrUCd4-cu7KmA-vPQXik-bzWj3J-8fD4K1-Wio2hS-agtQks-dNU9nB-agr53v-6KVRih-ELkpzB-fYPZdm)
[11](https://www.flickr.com/photos/121131556@N06/32477446357/in/photolist-RtVpiF-RYJegW-bMccUD-Wio62L-WCG5w9-KCX1Y-KCV1a-KCNQy-KCP7u-eZUtSv-EUWmed-29Qw84o-8pnvEd-2aemnfX-ch7W6w-ouTnhm-qJMTVD-22MygZo-8Rf55F-YrUCd4-cu7KmA-vPQXik-bzWj3J-8fD4K1-Wio2hS-agtQks-dNU9nB-agr53v-6KVRih-ELkpzB-fYPZdm-WQ9cEJ-Lt4xsq-agqXhZ-cEUg8E-VokaTt-on7a39-H8VBr2-ziDuZw-WQ8EQh-a5A6jV-2435o77-sS2A4o-AhT5cN-xxeePE-JzGvUw-27EKLkT-nHEXss-ofncxY-bmvLkq)
[12](https://www.flickr.com/photos/sloalan/31391996201/in/photolist-PQ1bMP-5tQSnv-pineGw-L5iuun-ydGxQY-fHskvi-88tPCY-9bLP3r-TuGvmG-xmwv4b-GV2SW4-28SfHGb-NVvMGD-F4sK4g-FFZVUW-nynaNg-ELkobV-HbVPFw-AfRPwn-npS36M-22T8hK6-uZ2LAe-2435oou-wMFBog-yu4MoX-AtRGQ5-xyHv9H-pJwPc8-xvTXjW-fAXCCc-nvZJNu-VBHGu5-M89bcQ-fPaJku-xxxJDQ-wHJreL-uiwi82-xxeSH9-BavjVA-yux3Vf-sdFvgE-EnRjG4-JBWHUu-s4bpt7-QfeMKY-VdWuAf-u53BEY-6oDF81-ydGz9Q-ngLrhT)

## Code style divergences
*N/A that I know of*

## Notes for instructor
*I consulted [tutsplus](https://code.tutsplus.com/tutorials/how-to-register-use-laravel-service-providers--cms-28966) 
again to explore setting up services to remove some logic code from my controller file, but I was getting an 
inexplicable error about the service not being found. Honestly, I found this aspect of Laravel a bit unwieldly. As I 
was finishing the project, I saw you had posted some guidance on this, but I saw that you said it wasn't required. In 
any case, I extracted some of the logic code into the controller class so that the single key upload method was not 
out of control. There are a lot of additional features that I could have added for such an ambitious project, but I 
tried to do enough to distinguish from foobooks and the standard catalog idea. For the seeders for files, I wasn't 
able to transition that to the production website in an easy way to demonstrate because the filenames were determined 
on the fly and the EXIF data was a bit too long. I was able to test by uploading manually, but creating proper seeders might have been possible if I set established filenames. I also realized late when testing the EXIF aspect with images from different cameras that a lot of cameras don't store the F-stop value (0x829d), and only the aperture value (0x9202), which another calculation needs to be performed on to get a standard F-stop. This means that some of the sample images don't have a F-stop extracted, but users can enter that manually for now if they want.
