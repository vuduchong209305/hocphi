<?php 

namespace App\Services;

use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_Permission;

class GoogleDriveService
{
    protected $client;
    protected $drive;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setAuthConfig(public_path('assets/google-service-account.json'));
        $this->client->addScope(Google_Service_Drive::DRIVE);

        $this->drive = new Google_Service_Drive($this->client);
    }

    /**
     * Chia sẻ file cho 1 email
     */
    public function shareFileWithEmail($fileId, $email)
    {
        $permission = new Google_Service_Drive_Permission([
            'type' => 'user',
            'role' => 'reader', // hoặc 'writer'
            'emailAddress' => $email,
        ]);

        return $this->drive->permissions->create($fileId, $permission, ['sendNotificationEmail' => false]);
    }

    /**
     * Lấy danh sách email đã được chia sẻ
     */
    public function listSharedEmails($fileId)
    {
        $permissions = $this->drive->permissions->listPermissions($fileId, [
            'fields' => 'permissions(emailAddress,role)'
        ]);

        $emails = [];
        foreach ($permissions->getPermissions() as $perm) {
            if (!empty($perm->getEmailAddress())) {
                $emails[] = [
                    'id'    => $perm->getId(),           // permissionId
                    'email' => $perm->getEmailAddress(),
                    'role'  => $perm->getRole(),
                ];
            }
        }

        return $emails;
    }

    public function removeSharedEmailByEmail($fileId, $email)
    {
        $permissions = $this->drive->permissions->listPermissions($fileId, [
            'fields' => 'permissions(id,emailAddress,role)'
        ]);

        foreach ($permissions->getPermissions() as $perm) {
            if (
                strtolower($perm->getEmailAddress()) === strtolower($email)
                && $perm->getRole() === 'reader'
            ) {
                // Xóa quyền
                return $this->drive->permissions->delete($fileId, $perm->getId());
            }
        }

        throw new \Exception("Không tìm thấy email $email trong danh sách chia sẻ");
    }
}


 ?>