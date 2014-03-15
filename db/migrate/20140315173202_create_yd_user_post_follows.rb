class CreateYdUserPostFollows < ActiveRecord::Migration
  def up
    create_table(:yd_user_post_follows) do |t|
      t.integer :user_id
      t.integer :post_id
      t.integer :status, :default => 0
      t.datetime :created_at
      t.datetime :updated_at
    end
  end

  def down
    drop_table :yd_user_post_follows
  end
end
