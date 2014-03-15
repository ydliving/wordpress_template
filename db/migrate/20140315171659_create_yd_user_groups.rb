class CreateYdUserGroups < ActiveRecord::Migration
  def up
    create_table(:user_groups) do |t|
      t.integer :user_id
      t.integer :group_id
      t.integer :status, :default => 0
      t.datetime :created_at
      t.datetime :updated_at
    end
  end

  def down
    create_table :user_groups
  end
end
